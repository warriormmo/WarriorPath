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
db_query('INSERT INTO `game_user` VALUES (' . AP . $id . AP . ',"auto_increment", ' . AP . $my['name'] . AP . ', ' . AP . $my['pass'] . AP . ',"0", ' . AP . time() . AP . ', "0", "2", "2", "2","2", "0", "0", "0", "0", "0", "0", "0", "0", "40", ' . rand(1, 8) . ', "0","0", "0", "0", "0", "0", "", "", "","0", "0", "0", "0", "0", "0");');
echo ('ok=1');
?>
