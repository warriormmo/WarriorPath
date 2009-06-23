<?php
error_reporting(1);
header("Expires: Mon, 1 Jul 1990 05:00:00 GMT");
		header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
$nocashe=rand(0,100000);
  DEFINE('TIME_USER',60);              // Время активности пользователя (сек.)
  DEFINE('TIME_BATTLE',60);            // Время жизни непринятого сражения (сек.)

  // Подгружаем модуль с функциями
  require_once('func.php');
  db_open();
  check_auth();                        // Проверяем авторизан-ли пользователь
                             // Открываем соединение с базой данных

  $time_start = getmicrotime();        // Вычисляем время, чтобы показать время генерации странички

  // Удаляем устаревшие записи о сражениях, время жизни которых истекло
  $dtime = time() - TIME_BATTLE;
  //db_query('DELETE FROM game_battle WHERE lasttime < '.AP.$dtime.AP.';');

  // Получаем всю информацию о пользователе
  db_query('SELECT * FROM game_user WHERE userid='.AP.$my['userid'].AP.' LIMIT 1;');
  $my = db_fetch();
  if(empty($my)){goto_error('Пользователь не найден в базе!');}

  // Обновляем время последнего посещения для пользователя
  db_query('UPDATE game_user SET lasttime='.AP.time().AP.' WHERE id='.$my['id'].' LIMIT 1;');

  
 
//преход если был принят бой другим игроком
    
    db_query('SELECT * FROM game_battle WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
    $battle = db_fetch();
    if(!empty($battle))
      {
//    db_query('SELECT * FROM game_user WHERE id='.$battle['user1'].' LIMIT 1;');
//    $battle['user1'] = db_fetch();

 //    Получаем доп. информацию о втором игроке
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


// Если пользователь создал сражение
  if(isset($_GET['add_battle']))
  {
    // Добавляем в таблицу запись о новой битве
     db_query('INSERT INTO game_battle VALUES("auto_increment",'.AP.$my['id'].AP.',"0",'.AP.time().AP.',"0","0","","0","0","0","1");');
      redirect('game.php'.'?nocashe='.$nocashe); // Обновим страничку
    
  }
 // Если пользователь принял чье-то сражение
  if(isset($_GET['get_battle']))
  {
    // Обновляем запись о сражении
    
    db_query('UPDATE game_battle SET user2='.$my['id'].' WHERE (id='.$_GET['get_battle'].')AND(`end`!=1) LIMIT 1;');
    db_query('DELETE FROM Hend WHERE id='.$my['id'].'');
    db_query('INSERT INTO Hend (SELECT * FROM UserHend WHERE id='.$my['id'].' LIMIT 1)');
    db_query('DELETE FROM koloda WHERE id='.$my['id'].'');
    db_query('INSERT INTO koloda (SELECT * FROM UserKoloda WHERE id='.$my['id'].' LIMIT 1)');
    db_query('UPDATE game_user SET hod="0" WHERE id='.$my['id'].' LIMIT 1;');
  //  db_query('UPDATE game_user SET hod="0" WHERE id='.$battle['user1'].' LIMIT 1;');
    db_query('UPDATE game_battle SET user2enter="1" WHERE (user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
    redirect('battle.php'.'?nocashe='.$nocashe); // Переходим в сражение
  }
   //пользователь удалил сражение
   if(isset($_GET['del_battle']))
  {
    // Обновляем запись о сражении
    
    db_query('DELETE FROM game_battle WHERE (user1='.$my['id'].')AND(`end`!=1)');
    
  }


?>


<body>


<table width=100% height=100% border="2">
        <tr>
                <td width="50%" height=20><b>Список игроков</b></td>
                <td width="50%" height=20><b>Список боев</b>
<?php
  // Проверяем, что пользователь не создал бой раньше..
  db_query('SELECT * FROM game_battle WHERE (user1='.$my['id'].') AND (`end`!=1) LIMIT 1;');
  $battle = db_fetch();
  $nocashe=rand(0,100000);
  if(empty($battle))
  {
    // ..тогда ему можно создать бой сейчас
    
    echo '<a href="game.php?add_battle'.'&nocashe='.$nocashe.'">Создать бой</a>';
  }else
  {echo '<a href="game.php?del_battle'.'&nocashe='.$nocashe.'">Удалить бой</a>';}
?>
              </td>
                
        </tr>

      
                <td width="33%" valign="top">
<?php
  // Получаем список всех пользователей, которые обновляли страничку не раньше, чем 60 секунд назад
  $dtime = time() - TIME_USER;
  db_query('SELECT * FROM game_user WHERE lasttime >= '.AP.$dtime.AP.';');
  while($user = db_fetch())
  {
    // Выводим информацию о пользователях
    echo ($user['id'].' - '.$user['name'].'<br>');
  }
?>                </td>
                <td width="33%" valign="top">
<?php
  // Получаем список сражений
  $dtime = time() - TIME_BATTLE;
  $cnt = 0;
  $battleexist=0;
  if ($battle['user1']==$my['id']){$battleexist=1;}
  db_query2('SELECT * FROM game_battle WHERE `end`!=1;');
  

  while($battle = db_fetch2())
  {
     
    $cnt++;

    // Получаем доп. информацию о первом игроке
    db_query('SELECT * FROM game_user WHERE id='.$battle['user1'].' LIMIT 1;');
    $battle['user1'] = db_fetch();

    // Получаем доп. информацию о втором игроке
    db_query('SELECT * FROM game_user WHERE id='.$battle['user2'].' LIMIT 1;');
    $battle['user2'] = db_fetch();
    
    
    // Выясняем, принят бой или нет
    if($battle['user2'] == 0)
    {
     
      echo $cnt.' - Бой открыт: ';
      echo $battle['user1']['name'];
       if(($battle['user1']['id'] != $my['id'])&($battleexist!=1))
      {
        // Нельзя принять бой, который создал ты сам
        $nocashe=rand(0,100000);
        echo ' - <a href="game.php?get_battle='.$battle['id'].'&nocashe='.$nocashe.'">Принять бой</a>';
      }
      echo '<br>';
    }else{
      echo $cnt.' - Бой начался: ';
      echo $battle['user1']['name'].' vs. ';
      echo $battle['user2']['name'].'<br>';
    }

  }
?>                </td>
          

			




 
</table>
<?php
  // Показываем время генерации странички
  $time_end = getmicrotime();
  $time_d = round($time_end - $time_start,4);
  echo 'Время генерации странички: '.$time_d.' сек.';
?>
  
</body>


</html>