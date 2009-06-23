<?php
error_reporting(1);
header("Expires: Mon, 1 Jul 1990 05:00:00 GMT");
		header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
$nocashe=rand(0,100000);
  DEFINE('TIME_USER',60);              // Р’СЂРµРјСЏ Р°РєС‚РёРІРЅРѕСЃС‚Рё РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ (СЃРµРє.)
  DEFINE('TIME_BATTLE',60);            // Р’СЂРµРјСЏ Р¶РёР·РЅРё РЅРµРїСЂРёРЅСЏС‚РѕРіРѕ СЃСЂР°Р¶РµРЅРёСЏ (СЃРµРє.)

  // РџРѕРґРіСЂСѓР¶Р°РµРј РјРѕРґСѓР»СЊ СЃ С„СѓРЅРєС†РёСЏРјРё
  require_once('func.php');
  db_open();
  check_auth();                        // РџСЂРѕРІРµСЂСЏРµРј Р°РІС‚РѕСЂРёР·Р°РЅ-Р»Рё РїРѕР»СЊР·РѕРІР°С‚РµР»СЊ
                             // РћС‚РєСЂС‹РІР°РµРј СЃРѕРµРґРёРЅРµРЅРёРµ СЃ Р±Р°Р·РѕР№ РґР°РЅРЅС‹С…

  $time_start = getmicrotime();        // Р’С‹С‡РёСЃР»СЏРµРј РІСЂРµРјСЏ, С‡С‚РѕР±С‹ РїРѕРєР°Р·Р°С‚СЊ РІСЂРµРјСЏ РіРµРЅРµСЂР°С†РёРё СЃС‚СЂР°РЅРёС‡РєРё

  // РЈРґР°Р»СЏРµРј СѓСЃС‚Р°СЂРµРІС€РёРµ Р·Р°РїРёСЃРё Рѕ СЃСЂР°Р¶РµРЅРёСЏС…, РІСЂРµРјСЏ Р¶РёР·РЅРё РєРѕС‚РѕСЂС‹С… РёСЃС‚РµРєР»Рѕ
  $dtime = time() - TIME_BATTLE;
  //db_query('DELETE FROM game_battle WHERE lasttime < '.AP.$dtime.AP.';');

  // РџРѕР»СѓС‡Р°РµРј РІСЃСЋ РёРЅС„РѕСЂРјР°С†РёСЋ Рѕ РїРѕР»СЊР·РѕРІР°С‚РµР»Рµ
  db_query('SELECT * FROM game_user WHERE userid='.AP.$my['userid'].AP.' LIMIT 1;');
  $my = db_fetch();
  if(empty($my)){goto_error('РџРѕР»СЊР·РѕРІР°С‚РµР»СЊ РЅРµ РЅР°Р№РґРµРЅ РІ Р±Р°Р·Рµ!');}

  // РћР±РЅРѕРІР»СЏРµРј РІСЂРµРјСЏ РїРѕСЃР»РµРґРЅРµРіРѕ РїРѕСЃРµС‰РµРЅРёСЏ РґР»СЏ РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ
  db_query('UPDATE game_user SET lasttime='.AP.time().AP.' WHERE id='.$my['id'].' LIMIT 1;');

  
 
//РїСЂРµС…РѕРґ РµСЃР»Рё Р±С‹Р» РїСЂРёРЅСЏС‚ Р±РѕР№ РґСЂСѓРіРёРј РёРіСЂРѕРєРѕРј
    
    db_query('SELECT * FROM game_battle WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
    $battle = db_fetch();
    if(!empty($battle))
      {
//    db_query('SELECT * FROM game_user WHERE id='.$battle['user1'].' LIMIT 1;');
//    $battle['user1'] = db_fetch();

 //    РџРѕР»СѓС‡Р°РµРј РґРѕРї. РёРЅС„РѕСЂРјР°С†РёСЋ Рѕ РІС‚РѕСЂРѕРј РёРіСЂРѕРєРµ
 //   db_query('SELECT * FROM game_user WHERE id='.$battle['user2'].' LIMIT 1;');
 //   $battle['user2'] = db_fetch();
 
 
    if(($battle['user1'] == $my['id'])&($battle['user2']!=0))
    {
    if($battle['user1enter']==0)
    {
    db_query('DELETE FROM Hend WHERE id='.$my['id'].'');
    db_query('INSERT INTO Hend (SELECT * FROM UserHend WHERE id='.$my['id'].' LIMIT 1)');
    
    db_query('DELETE FROM koloda WHERE id='.$my['id'].'');
    db_query('INSERT INTO koloda (SELECT * FROM UserKoloda WHERE id='.$my['id'].' LIMIT 1)');
    db_query('UPDATE game_battle SET user1enter="1" WHERE (user1='.$my['id'].')AND(`end`!=1) LIMIT 1;');
    db_query('UPDATE game_user SET hod="0" WHERE (id='.$my['id'].') LIMIT 1;');
  
    redirect('battle.php'.'?nocashe='.$nocashe);
    }else
    {redirect('battle.php'.'?nocashe='.$nocashe);
    }
   }
    if(($battle['user2'] == $my['id'])&($battle['user1']!=0))
    {
    if($battle['user2enter']==0)
    {
    db_query('DELETE FROM Hend WHERE id='.$my['id'].'');
    db_query('INSERT INTO Hend (SELECT * FROM UserHend WHERE id='.$my['id'].' LIMIT 1)');
    
    db_query('DELETE FROM koloda WHERE id='.$my['id'].'');
    db_query('INSERT INTO koloda (SELECT * FROM UserKoloda WHERE id='.$my['id'].' LIMIT 1)');
    db_query('UPDATE game_battle SET user2enter="1" WHERE (user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
    db_query('UPDATE game_user SET hod="0" WHERE (id='.$my['id'].') LIMIT 1;');
    redirect('battle.php'.'?nocashe='.$nocashe);
    }else
    {redirect('battle.php'.'?nocashe='.$nocashe);}}
    }


// Р•СЃР»Рё РїРѕР»СЊР·РѕРІР°С‚РµР»СЊ СЃРѕР·РґР°Р» СЃСЂР°Р¶РµРЅРёРµ
  if(isset($_GET['add_battle']))
  {
    // Р”РѕР±Р°РІР»СЏРµРј РІ С‚Р°Р±Р»РёС†Сѓ Р·Р°РїРёСЃСЊ Рѕ РЅРѕРІРѕР№ Р±РёС‚РІРµ
     db_query('INSERT INTO game_battle VALUES("auto_increment",'.AP.$my['id'].AP.',"0",'.AP.time().AP.',"0","0","","0","0","0","1");');
      redirect('game.php'.'?nocashe='.$nocashe); // РћР±РЅРѕРІРёРј СЃС‚СЂР°РЅРёС‡РєСѓ
    
  }
 // Р•СЃР»Рё РїРѕР»СЊР·РѕРІР°С‚РµР»СЊ РїСЂРёРЅСЏР» С‡СЊРµ-С‚Рѕ СЃСЂР°Р¶РµРЅРёРµ
  if(isset($_GET['get_battle']))
  {
    // РћР±РЅРѕРІР»СЏРµРј Р·Р°РїРёСЃСЊ Рѕ СЃСЂР°Р¶РµРЅРёРё
    
    db_query('UPDATE game_battle SET user2='.$my['id'].' WHERE (id='.$_GET['get_battle'].')AND(`end`!=1) LIMIT 1;');
    db_query('DELETE FROM Hend WHERE id='.$my['id'].'');
    db_query('INSERT INTO Hend (SELECT * FROM UserHend WHERE id='.$my['id'].' LIMIT 1)');
    db_query('DELETE FROM koloda WHERE id='.$my['id'].'');
    db_query('INSERT INTO koloda (SELECT * FROM UserKoloda WHERE id='.$my['id'].' LIMIT 1)');
    db_query('UPDATE game_user SET hod="0" WHERE id='.$my['id'].' LIMIT 1;');
  //  db_query('UPDATE game_user SET hod="0" WHERE id='.$battle['user1'].' LIMIT 1;');
<<<<<<< HEAD:game.php
    db_query('UPDATE game_battle SET user2enter="1" WHERE (user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
    redirect('battle.php'.'?nocashe='.$nocashe); // Переходим в сражение
=======
    db_query('UPDATE game_battle SET user2enter="1" WHERE (id='.$my['id'].')AND(`end`!=1) LIMIT 1;');
    redirect('battle.php'.'?nocashe='.$nocashe); // РџРµСЂРµС…РѕРґРёРј РІ СЃСЂР°Р¶РµРЅРёРµ
>>>>>>> smu/kartscript:game.php
  }
   //РїРѕР»СЊР·РѕРІР°С‚РµР»СЊ СѓРґР°Р»РёР» СЃСЂР°Р¶РµРЅРёРµ
   if(isset($_GET['del_battle']))
  {
    // РћР±РЅРѕРІР»СЏРµРј Р·Р°РїРёСЃСЊ Рѕ СЃСЂР°Р¶РµРЅРёРё
    
    db_query('DELETE FROM game_battle WHERE (user1='.$my['id'].')AND(`end`!=1)');
    
  }


?>


<body>


<table width=100% height=100% border="2">
        <tr>
                <td width="50%" height=20><b>РЎРїРёСЃРѕРє РёРіСЂРѕРєРѕРІ</b></td>
                <td width="50%" height=20><b>РЎРїРёСЃРѕРє Р±РѕРµРІ</b>
<?php
  // РџСЂРѕРІРµСЂСЏРµРј, С‡С‚Рѕ РїРѕР»СЊР·РѕРІР°С‚РµР»СЊ РЅРµ СЃРѕР·РґР°Р» Р±РѕР№ СЂР°РЅСЊС€Рµ..
  db_query('SELECT * FROM game_battle WHERE (user1='.$my['id'].') AND (`end`!=1) LIMIT 1;');
  $battle = db_fetch();
  $nocashe=rand(0,100000);
  if(empty($battle))
  {
    // ..С‚РѕРіРґР° РµРјСѓ РјРѕР¶РЅРѕ СЃРѕР·РґР°С‚СЊ Р±РѕР№ СЃРµР№С‡Р°СЃ
    
    echo '<a href="game.php?add_battle'.'&nocashe='.$nocashe.'">РЎРѕР·РґР°С‚СЊ Р±РѕР№</a>';
  }else
  {echo '<a href="game.php?del_battle'.'&nocashe='.$nocashe.'">РЈРґР°Р»РёС‚СЊ Р±РѕР№</a>';}
?>
              </td>
                
        </tr>

      
                <td width="33%" valign="top">
<?php
  // РџРѕР»СѓС‡Р°РµРј СЃРїРёСЃРѕРє РІСЃРµС… РїРѕР»СЊР·РѕРІР°С‚РµР»РµР№, РєРѕС‚РѕСЂС‹Рµ РѕР±РЅРѕРІР»СЏР»Рё СЃС‚СЂР°РЅРёС‡РєСѓ РЅРµ СЂР°РЅСЊС€Рµ, С‡РµРј 60 СЃРµРєСѓРЅРґ РЅР°Р·Р°Рґ
  $dtime = time() - TIME_USER;
  db_query('SELECT * FROM game_user WHERE lasttime >= '.AP.$dtime.AP.';');
  while($user = db_fetch())
  {
    // Р’С‹РІРѕРґРёРј РёРЅС„РѕСЂРјР°С†РёСЋ Рѕ РїРѕР»СЊР·РѕРІР°С‚РµР»СЏС…
    echo ($user['id'].' - '.$user['name'].'<br>');
  }
?>                </td>
                <td width="33%" valign="top">
<?php
  // РџРѕР»СѓС‡Р°РµРј СЃРїРёСЃРѕРє СЃСЂР°Р¶РµРЅРёР№
  $dtime = time() - TIME_BATTLE;
  $cnt = 0;
  $battleexist=0;
  if ($battle['user1']==$my['id']){$battleexist=1;}
  db_query2('SELECT * FROM game_battle WHERE `end`!=1;');
  

  while($battle = db_fetch2())
  {
     
    $cnt++;

    // РџРѕР»СѓС‡Р°РµРј РґРѕРї. РёРЅС„РѕСЂРјР°С†РёСЋ Рѕ РїРµСЂРІРѕРј РёРіСЂРѕРєРµ
    db_query('SELECT * FROM game_user WHERE id='.$battle['user1'].' LIMIT 1;');
    $battle['user1'] = db_fetch();

    // РџРѕР»СѓС‡Р°РµРј РґРѕРї. РёРЅС„РѕСЂРјР°С†РёСЋ Рѕ РІС‚РѕСЂРѕРј РёРіСЂРѕРєРµ
    db_query('SELECT * FROM game_user WHERE id='.$battle['user2'].' LIMIT 1;');
    $battle['user2'] = db_fetch();
    
    
    // Р’С‹СЏСЃРЅСЏРµРј, РїСЂРёРЅСЏС‚ Р±РѕР№ РёР»Рё РЅРµС‚
    if($battle['user2'] == 0)
    {
     
      echo $cnt.' - Р‘РѕР№ РѕС‚РєСЂС‹С‚: ';
      echo $battle['user1']['name'];
       if(($battle['user1']['id'] != $my['id'])&($battleexist!=1))
      {
        // РќРµР»СЊР·СЏ РїСЂРёРЅСЏС‚СЊ Р±РѕР№, РєРѕС‚РѕСЂС‹Р№ СЃРѕР·РґР°Р» С‚С‹ СЃР°Рј
        $nocashe=rand(0,100000);
        echo ' - <a href="game.php?get_battle='.$battle['id'].'&nocashe='.$nocashe.'">РџСЂРёРЅСЏС‚СЊ Р±РѕР№</a>';
      }
      echo '<br>';
    }else{
      echo $cnt.' - Р‘РѕР№ РЅР°С‡Р°Р»СЃСЏ: ';
      echo $battle['user1']['name'].' vs. ';
      echo $battle['user2']['name'].'<br>';
    }

  }
?>                </td>
          

			




 
</table>
<?php
  // РџРѕРєР°Р·С‹РІР°РµРј РІСЂРµРјСЏ РіРµРЅРµСЂР°С†РёРё СЃС‚СЂР°РЅРёС‡РєРё
  $time_end = getmicrotime();
  $time_d = round($time_end - $time_start,4);
  echo 'Р’СЂРµРјСЏ РіРµРЅРµСЂР°С†РёРё СЃС‚СЂР°РЅРёС‡РєРё: '.$time_d.' СЃРµРє.';
?>
  
</body>


</html>