<?php
  header("Expires: Mon, 1 Jul 1990 05:00:00 GMT");
                header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
                header("Cache-Control: no-cache, must-revalidate");
                header("Pragma: no-cache");
  $msg      = '';
  $redirect = '';
   require_once('func.php');
  //check_auth(); 

  if(isset($_POST['txtUserName']) AND
     isset($_POST['txtUserPass']))
    {
    $is_auth = false; // Изначально не авторизованы
    require_once('func.php');
    db_open();
    db_query('SELECT * FROM game_user WHERE name='.AP.$_POST['txtUserName'].AP.' LIMIT 1 ;');
    $user = db_fetch();
    if(!empty($user))
    {
      if($user['pass'] == md5($_POST['txtUserPass']))
      {
        setcookie(cookname,$user['userid']);
        $is_auth = true;
      }else{  // Не подходит пароль
              $is_auth = false; }
    }else{    $is_auth = false; }

    if($is_auth)
    { echo ("ok=1");
    }else{
      echo ("ok=false");  }
  }

?>
