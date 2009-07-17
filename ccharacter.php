<?php
header("Expires: Mon, 1 Jul 1990 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
require_once ('func.php');
db_open();
check_auth(); //проврка куков
db_query('SELECT * FROM game_user WHERE userid=' . AP . $my['userid'] . AP . ' LIMIT 1;');
$my = db_fetch();
if (empty($my)) {
  redirect('index.html');
}
$rasa= $_POST['b'];
$klass = $_POST['c'];
$from = $_POST['d'];
   
if ($my['reg']==0)
{
switch ($rasa) {
case 1:
    db_query('UPDATE `game_user` SET `Sila` = "4",`Lovkost` = "2",`Mishlenie` = "2",`Obrazovanie` = "2" WHERE id = ' . $my['id'] . ' LIMIT 1;');
    break;
case 2:
    db_query('UPDATE `game_user` SET `Sila` = "2",`Lovkost` = "3",`Mishlenie` = "3",`Obrazovanie` = "2" WHERE id = ' . $my['id'] . ' LIMIT 1;');
    break;
case 3:
    db_query('UPDATE `game_user` SET `Sila` = "2",`Lovkost` = "3",`Mishlenie` = "2",`Obrazovanie` = "2" WHERE id = ' . $my['id'] . ' LIMIT 1;');
    break;
case 4:
    db_query('UPDATE `game_user` SET `Sila` = "3",`Lovkost` = "2",`Mishlenie` = "3",`Obrazovanie` = "2" WHERE id = ' . $my['id'] . ' LIMIT 1;');
    break;
case 5:
    db_query('UPDATE `game_user` SET `Sila` = "2",`Lovkost` = "4",`Mishlenie` = "2",`Obrazovanie` = "2" WHERE id = ' . $my['id'] . ' LIMIT 1;');
    break;
}
switch ($klass) {
case 1:
    db_query('UPDATE `game_user` SET `schoolred` = "2",`Boks` = "2" WHERE id = ' . $my['id'] . ' LIMIT 1;');
    break;
case 2:
     db_query('UPDATE `game_user` SET `schoolblue` = "2",`yklonenie` = "2" WHERE id = ' . $my['id'] . ' LIMIT 1;');
    break;
case 3:
     db_query('UPDATE `game_user` SET `schoolgreen` = "2",`Boks` = "2" WHERE id = ' . $my['id'] . ' LIMIT 1;');
    break;
case 4:
     db_query('UPDATE `game_user` SET `schoolwhite` = "2",`Boks` = "1",`yklonenie`="1" WHERE id = ' . $my['id'] . ' LIMIT 1;');
    break;
case 5:
    db_query('UPDATE `game_user` SET `schoolblack` = "2",`Boks` = "2" WHERE id = ' . $my['id'] . ' LIMIT 1;');
    break;
}    



db_query('UPDATE `game_user` SET `reg` = "1" WHERE id = ' . $my['id'] . ' LIMIT 1;');
$startkoloda='a:31:{i:0;s:12:"10_ydar_gray";i:1;s:12:"12_ydar_gray";i:2;s:15:"17_mgnoven_gray";i:3;s:12:"18_ydar_gray";i:4;s:15:"19_mgnoven_gray";i:5;s:11:"20_ydar_red";i:6;s:11:"21_ydar_red";i:7;s:11:"22_ydar_red";i:8;s:11:"23_ydar_red";i:9;s:11:"24_ydar_red";i:10;s:11:"25_ydar_red";i:11;s:11:"26_ydar_red";i:12;s:11:"27_ydar_red";i:13;s:11:"28_ydar_red";i:14;s:14:"3_mgnoven_gray";i:15;s:11:"34_ydar_red";i:16;s:14:"35_mgnoven_red";i:17;s:14:"36_mgnoven_red";i:18;s:14:"37_mgnoven_red";i:19;s:14:"38_mgnoven_red";i:20;s:11:"39_ydar_red";i:21;s:14:"4_mgnoven_gray";i:22;s:14:"40_mgnoven_red";i:23;s:14:"41_mgnoven_red";i:24;s:14:"42_mgnoven_red";i:25;s:14:"42_mgnoven_red";i:26;s:11:"43_ydar_red";i:27;s:14:"5_mgnoven_gray";i:28;s:11:"6_ydar_gray";i:29;s:11:"9_ydar_gray";i:30;s:0:"";}';
db_query('INSERT INTO `UserHend` VALUES (' . AP . $my['id'] . AP . ', "", "");');
db_query('INSERT INTO `UserKoloda` VALUES (' . AP . $my['id'] . AP . ', "",'.AP.$startkoloda.AP.');');
echo ('ok=1');
}
?>
