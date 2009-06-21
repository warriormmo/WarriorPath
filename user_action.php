<?php
  require_once('include/commons.inc');
  require_once('libs/user.lib');

  $action = @$_GET['action'];

  $error =  '';

  switch($action){
    case 'reg':
      $user_nick = @$_REQUEST['nick'];
      $user_email = @$_REQUEST['email'];
      $user_password = @$_REQUEST['password'];

      if (!$user_nick) $error .= "\nОтсутвует имя пользователя!";
      if (!$user_email) $error .= "\nОтсутвует Email пользователя!";
      if (!$user_password) $error .= "\nОтсутвует пароль пользователя!";

      if (!$error){
        $user = usr_getUser(db_relation(
          db_field('nick', DB_EQU, $user_nick),
          DB_OR,
          db_field('email', DB_EQU, $user_email)
        ));

        if ($user){
          if (strtolower($user['nick']) == strtolower($user_nick)) $error = 'Пользователь с таким ником уже присутствует в игре';
          if (strtolower($user['email']) == strtolower($user_email)) $error = 'Пользователь с таким адресом E-mail уже присутствует в игре';
        } else {
          $res = usr_insertUser(array(
            'nick' => $user_nick,
            'email' => $user_email,
            'password' => md5(md5($user_password)),
           ));
           $error = $res ? 0 : 'Внутенняя ошибка сервера.';
        }
      }
    break;
    case 'auth':
      $error = 0;
      $user_nick = @$_REQUEST['nick'];
      $user_password = @$_REQUEST['password'];

      if (!$user_nick) $error .= "\nОтсутвует имя пользователя!";
      if (!$user_password) $error .= "\nОтсутвует пароль пользователя!";

      if ($error == 0){
        $user = usr_getUser(array(
          'nick' => $user_nick
        ));
        if (!$user){
          $error = 'Пользователь с таким ником не найден.';
        } else {
          if ($user['password'] != md5(md5($user_password))){
            $error = 'Неверный пароль';
          }
        }
      }
      if ($error == 0){
        setcookie(cookie_userid, $user['id'], 0, '/');
        usr_updateUser(array('lastvisit_date' => time()), $user['id']);
      } else {
        setcookie(cookie_userid, 0, 0, '/');
      }
    break;
  }

  $error = ($error === '') ? 'Неверный код действия.' : $error;

  echo cmn_generateResultXML($error);
  return;
?>