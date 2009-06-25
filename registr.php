<?php
require_once ('func.php');
db_open();
$my['name'] = $_POST['txtUserName'];
$user_pass = $_POST['txtUserPass'];
$user_repass = $_POST['txtUserRePass'];
if ($user_pass == $user_repass) {
  $my['pass'] = md5($user_pass);
} else {
  echo ("ok=2");
  die;
}
db_query('SELECT id FROM game_user WHERE name=' . AP . $my['name'] . AP . ' ;');
$users = db_fetch();
if (!empty($users)) {
  echo ("ok=2");
  die;
}
$id = generate_password(10);
db_query('INSERT INTO `game_user` VALUES (' . AP . $id . AP . ',"auto_increment", ' . AP . $my['name'] . AP . ', ' . AP . $my['pass'] . AP . ', ' . AP . time() . AP . ', "0", "5", "5", "5","5", "0", "5", "5", "5", "5", "5", "5", "5", "5", ' . rand(1, 8) . ', "0","0", "0", "0", "0", "0", "", "", "","0", "0", "0", "0", "0", "0");');
db_query('SELECT * FROM game_user WHERE userid=' . AP . $id . AP . ' LIMIT 1;');
$my = db_fetch();
db_query('INSERT INTO `UserHend` VALUES (' . AP . $my['id'] . AP . ', "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");');
db_query('INSERT INTO `UserKoloda` VALUES (' . AP . $my['id'] . AP . ', "10_ydar_gray", "12_ydar_gray", "17_mgnoven_gray", "18_ydar_gray", "19_mgnoven_gray", "20_ydar_red", "21_ydar_red", "22_ydar_red", "23_ydar_red", "24_ydar_red", "25_ydar_red", "26_ydar_red", "27_ydar_red", "28_ydar_red", "3_mgnoven_gray", "34_ydar_red", "35_mgnoven_red", "36_mgnoven_red", "37_mgnoven_red", "38_mgnoven_red", "39_ydar_red", "4_mgnoven_gray", "40_mgnoven_red", "41_mgnoven_red", "42_mgnoven_red", "42_mgnoven_red", "43_ydar_red", "5_mgnoven_gray", "6_ydar_gray", "9_ydar_gray");');
echo ('ok=1');
?>
