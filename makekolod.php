<?
header("Expires: Mon, 1 Jul 1990 05:00:00 GMT");
		header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
error_reporting(0);

  require_once('func.php');
  
  db_open();
  check_auth();//проврка куков
  $KolName=$_GET['KolName'];
  $koloda= split(",", $_GET['koloda']);
  db_query('SELECT * FROM game_user WHERE userid='.AP.$my['userid'].AP.' LIMIT 1;');
  $my = db_fetch();
  db_query('SELECT * FROM UsersSpisokKart WHERE id='.$my['id'].' LIMIT 1;');
  $spisokkart = db_fetch();
  $spisok = split(";", $spisokkart['AllKarts']);
  $count = count($koloda);
  
  for ($i = 0; $i <$count; $i++) {
    
    $zapkoloda=$zapkoloda.$spisok[$koloda[$i]].";";
  }
  echo $zapkoloda;
   
  
  
?>