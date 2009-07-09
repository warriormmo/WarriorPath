<?
require_once ('libs/database.lib');
header("Expires: Mon, 1 Jul 1990 05:00:00 GMT");
		header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");


  require_once('func.php');
  
  db_open();
  check_auth();//проврка куков
  $KolName=$_GET['KolName'];
  //$koloda= split(",", $_GET['koloda']);
  db_query('SELECT * FROM game_user WHERE userid='.AP.$my['userid'].AP.' LIMIT 1;');
  $my = db_fetch();
  
  db_query('SELECT * FROM koloda WHERE id ='.$my['id'].' LIMIT 1;');

  $koloda = db_fetch();
  $kol=$koloda['koloda'];
  $koloda = unserialize($koloda['koloda']);

  for ($i = 0; $i <= 30; $i++)
  {
   echo $koloda[$i].";";
  }
  
  $arr = array();
  db_query('SELECT * FROM Hend WHERE id='.$my['id'].' LIMIT 1;');
  $hend = db_fetch();
  $hend = unserialize($hend['hend']);
  //удаляем карты из начала, если не получается добрать карт
  
  $j = 0;
  for ($i = 1; $i <= ($my['Obrazovanie'] * 3); $i++) {
    if ($hend[$i] <> "") {
      $j++;
    }
  }
  $sbros = $my['Obrazovanie'] - (($my['Obrazovanie'] * 3) - $j);
  for ($i = 1; $i <= ($sbros); $i++) {
    $hend[$i] = "";
  }
  //сортируе руку убирая пустые
  $j = 1;
  for ($i = 1; $i <= ($my['Obrazovanie'] * 3); $i++) {
    if ($hend[$i] <> "") {
      $arr[$j] = $hend[$i];
      $j++;
    }
  }
  for ($i = 1; $i <= $my['Obrazovanie']; $i++) {
    $arr[$j] = $koloda[rand(1, 30) ];
    $koloda[$i]="";
    $j++;
        
  }
  echo "<br>";
  for ($i = 1; $i <= 30; $i++) {
  echo $arr[$i];
  }
  $sendarr=serialize($arr);

  db_query('UPDATE `Hend` SET `hend` = '.AP.$sendarr.AP.' WHERE id = '.AP.$my['id'].AP.' LIMIT 1;');
  $arr = array();
  $j = 1;
  for ($i = 1; $i <= 30; $i++) {
    if ($koloda[$i] <> "") {
      $arr[$j] = $koloda[$i];
      $j++;
    }
  }
  echo "<br>";
  for ($i = 1; $i <= 30; $i++) {
  echo $arr[$i];
  }
  $sendarr=serialize($arr);
  db_query('UPDATE `koloda` SET `koloda` = ' .AP.$sendarr.AP.' WHERE id = '.AP. $my['id'].AP.' LIMIT 1;');
  
  echo "<br>";
  for ($i = 1; $i <= 30; $i++) {
  echo $koloda[$i];
  }
  echo "<br>";
  for ($i = 1; $i <= 30; $i++) {
  echo $hend[$i];
  }
  echo "<br>";
  for ($i = 1; $i <= 30; $i++) {
  echo $arr[$i];
  }
  
  
 
  db_query('SELECT * FROM koloda WHERE id='.$my['id'].' LIMIT 1;');
  $spisokkart = db_fetch();
  $spisok = split(";", '10_ydar_gray;12_ydar_gray;17_mgnoven_gray;18_ydar_gray;19_mgnoven_gray;20_ydar_red;21_ydar_red;22_ydar_red;23_ydar_red;24_ydar_red;25_ydar_red;26_ydar_red;27_ydar_red;28_ydar_red;3_mgnoven_gray;34_ydar_red;35_mgnoven_red;36_mgnoven_red;37_mgnoven_red;38_mgnoven_red;39_ydar_red;4_mgnoven_gray;40_mgnoven_red;41_mgnoven_red;42_mgnoven_red;42_mgnoven_red;43_ydar_red;5_mgnoven_gray;6_ydar_gray;9_ydar_gray;');
  $count = count($koloda);
  $test = serialize($spisok);
  $test2 = unserialize($test);
echo "<br>";
echo "<br>";
  for ($i = 0; $i <20; $i++) {
      echo $test2[$i];

    
  }
  echo "<br>";
  echo "<br>";
  echo $test;
  
  
   
  
  
?>