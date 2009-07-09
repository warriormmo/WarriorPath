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
$startkoloda='a:31:{i:0;s:12:"10_ydar_gray";i:1;s:12:"12_ydar_gray";i:2;s:15:"17_mgnoven_gray";i:3;s:12:"18_ydar_gray";i:4;s:15:"19_mgnoven_gray";i:5;s:11:"20_ydar_red";i:6;s:11:"21_ydar_red";i:7;s:11:"22_ydar_red";i:8;s:11:"23_ydar_red";i:9;s:11:"24_ydar_red";i:10;s:11:"25_ydar_red";i:11;s:11:"26_ydar_red";i:12;s:11:"27_ydar_red";i:13;s:11:"28_ydar_red";i:14;s:14:"3_mgnoven_gray";i:15;s:11:"34_ydar_red";i:16;s:14:"35_mgnoven_red";i:17;s:14:"36_mgnoven_red";i:18;s:14:"37_mgnoven_red";i:19;s:14:"38_mgnoven_red";i:20;s:11:"39_ydar_red";i:21;s:14:"4_mgnoven_gray";i:22;s:14:"40_mgnoven_red";i:23;s:14:"41_mgnoven_red";i:24;s:14:"42_mgnoven_red";i:25;s:14:"42_mgnoven_red";i:26;s:11:"43_ydar_red";i:27;s:14:"5_mgnoven_gray";i:28;s:11:"6_ydar_gray";i:29;s:11:"9_ydar_gray";i:30;s:0:"";}';
db_query('INSERT INTO `UserHend` VALUES (' . AP . $my['id'] . AP . ', "", "");');
db_query('INSERT INTO `UserKoloda` VALUES (' . AP . $my['id'] . AP . ', "",'.AP.$startkoloda.AP.');');
echo ('ok=1');
?>
