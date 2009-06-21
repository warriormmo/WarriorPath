<?php
  require_once('include/commons.inc');

  $action = @$_GET['action'];

  $error =  '';

  switch($action){
    case 'reg':
      $user_nick = @$_POST['nick'];
      $user_email = @$_POST['email'];
      $user_password = @$_POST['password'];

      if (!$user_nick) $error .= "\nОтсутвует имя пользователя!";
      if (!$user_email) $error .= "\nОтсутвует Email пользователя!";
      if (!$user_password) $error .= "\nОтсутвует пароль пользователя!";

      if (!$error){
        $user = usr_getUser(db_relation(
          db_field('nick', DB_EQU, $user_nick),
          DB_OR,
          db_field('email', DB_EQU, $user_password);
        ));
        if ($user){
          if ($user['nick'] == $user_nick) $error = 'Пользователь с таким ником уже присутствует в игре';
          if ($user['email'] == $user_email) $error = 'Пользователь с таким адресом E-mail уже присутствует в игре';
        } else {
          $res = usr_insertUser(array(
            'nick' => $user_nick,
            'email' => $user_email,
            'password' => md5(md5($user_password)),
           ));
           $error = $res ? 0 : 'Внутенняя ошибка сервера.',
        }
      }
    break;
  }

  echo cmn_generateResultXML($error);
?>