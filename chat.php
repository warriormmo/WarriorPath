<?
header("Expires: Mon, 1 Jul 1990 05:00:00 GMT");
		header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
error_reporting(0);
$mesage =$_POST["mesage"];

  require_once('func.php');
  
  db_open();
  check_auth();//������� �����

  db_query('SELECT * FROM game_user WHERE userid='.AP.$my['userid'].AP.' LIMIT 1;');
  $my = db_fetch();
  db_query('SELECT * FROM game_battle WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
  $battle = db_fetch();
if ($mesage<>""){$battle['log']=$battle['log']."<b>".$my['name'].": "."</b>".mysql_real_escape_string($mesage)."\n";}
  
  echo "chatlog=".$battle['log'];
  db_query('UPDATE `game_battle` SET `log` = '.AP.$battle['log'].AP.' WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');

?>