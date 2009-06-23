<?php
  require_once('func.php');
  db_open();

    $my['name']  = $_POST['txtUserName'];
    $user_pass   = $_POST['txtUserPass'];
    $user_repass = $_POST['txtUserRePass'];

    if($user_pass == $user_repass)
    {
      $my['pass'] = md5($user_pass);
    } else {
      echo ("ok=2");die;
    }

    db_query('SELECT id FROM game_user WHERE name='.AP.$my['name'].AP.' ;');
    $users = db_fetch();
    if(!empty($users))
    {
      echo ("ok=2");die;
    }
     $id=generate_password(10);
     
    db_query('INSERT INTO `game_user` VALUES ('.AP.$id.AP.',"auto_increment", '.AP.$my['name'].AP.', '.AP.$my['pass'].AP.', '.AP.time().AP.', "0", "5", "5", "5","5", "0", "5", "5", "5", "5", "5", "5", "5", "5", '.rand(1,8).', "0","0", "0", "0", "0", "0", "", "", "","0", "0", "0", "0", "0", "0");');
    
    db_query('SELECT * FROM game_user WHERE userid='.AP.$id.AP.' LIMIT 1;');
    $my = db_fetch();
    
    db_query('INSERT INTO `UserHend` VALUES ('.AP.$my['id'].AP.', "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");');
    db_query('INSERT INTO `UserKoloda` VALUES ('.AP.$my['id'].AP.', "10_ydar", "12_ydar", "17_mgnoven", "18_ydar", "19_mgnoven", "20_ydar", "21_ydar", "22_ydar", "23_ydar", "24_ydar", "25_ydar", "26_ydar", "27_ydar", "28_ydar", "3_mgnoven", "34_ydar", "35_mgnoven", "36_mgnoven", "37_mgnoven", "38_mgnoven", "39_ydar", "4_mgnoven", "40_mgnoven", "41_mgnoven", "42_mgnoven", "42_mgnoven", "43_ydar", "5_mgnoven", "6_ydar", "9_ydar");');


    echo('ok=1');
    

?>
