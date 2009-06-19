<?php
  require_once('func.php');

  header("Expires: Mon, 1 Jul 1990 05:00:00 GMT");
  header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");

  $inputdata =$_POST["inputdata"];
  $hod=$_POST['hod'];
  $myhod=split(",",$inputdata);

  $time_start = getmicrotime(); 

  db_open();
  check_auth();//проврка куков

  db_query('SELECT * FROM game_user WHERE userid='.AP.$my['userid'].AP.' LIMIT 1;');
  $my = db_fetch();
  if(empty($my)){
    goto_error_global('Пользователь не найден в базе!');
  }
  db_query('SELECT * FROM Hend WHERE id='.$my['id'].' ;');
  $hend = db_fetch();
  db_query('SELECT * FROM game_battle WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
  $battle = db_fetch();
  if (!$battle){
    echo 'hod='.$my['Hod'];die;
  }//если зашли в игру а бой уже закончен

  //чтение из баз значений

  if($battle['user1']==$my['id']){
    $enemy['id']=$battle['user2'];
  }
  if($battle['user2']==$my['id']){
    $enemy['id']=$battle['user1'];
  }

  db_query('SELECT * FROM game_user WHERE id='.$enemy['id'].' LIMIT 1;');
  $enemy = db_fetch();

  //выкинем игрока кто задерживает игру!!!! 4 минуты и нафиг на любом из ходов..
  if ((time()-($enemy['lasttime'])>240)&(($my['Hod']==2)||($my['Hod']==3)||($my['Hod']==7)||($my['Hod']==9)||($my['Hod']==15)||($my['Hod']==16)||($my['Hod']==14)||($my['Hod']==13))){
    $my['Hod']=21;
    db_query('UPDATE `game_user` SET `Hod` = "21" WHERE id = '.$my['id'].' LIMIT 1;');
    db_query('UPDATE `game_user` SET `Hod` = "20" WHERE id = '.$enemy['id'].' LIMIT 1;');
    //db_query('UPDATE game_battle SET `end`=1,`WinUser`='.AP.$enemy['name'].AP.',`LoseUser`= '.AP.$my['name'].AP.' WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
    db_query('UPDATE `game_user` SET `lasthod` = "",`carapina`=0,`legkoe`=0,`srednee`=0,`tyageloe`=0,`smertelnoe`=0,`smert`=0,`stoyka` = "",`technic` = "",`modranenie`=0,`moddeystvie`=0  WHERE id = '.$my['id'].' LIMIT 1;');
    db_query('UPDATE `game_user` SET `lasthod` = "",`carapina`=0,`legkoe`=0,`srednee`=0,`tyageloe`=0,`smertelnoe`=0,`smert`=0,`stoyka` = "",`technic` = "",`modranenie`=0,`moddeystvie`=0   WHERE id = '.$enemy['id'].' LIMIT 1;');
    db_query('DELETE  FROM `modificators` WHERE (`id`='.$my['id'].') OR (`id`='.$enemy['id'].')');
  }
  // движение
  if ($hod==4){
    if ($battle['dist']==1){
      db_query('UPDATE game_battle SET `dist`=2 WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
      $my['moddeystvie']--;
      db_query('UPDATE game_user SET `moddeystvie`='.$my['moddeystvie'].' WHERE id='.$my['id'].' LIMIT 1;');
    }
    if ($battle['dist']==0){
      db_query('UPDATE game_battle SET `dist`=1 WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
      $my['moddeystvie']--;
      db_query('UPDATE game_user SET `moddeystvie`='.$my['moddeystvie'].' WHERE id='.$my['id'].' LIMIT 1;');
    }
  }

  if ($hod==5){
    if ($battle['dist']==2){
      db_query('UPDATE game_battle SET `dist`=1 WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
      $my['moddeystvie']--;
      db_query('UPDATE game_user SET `moddeystvie`='.$my['moddeystvie'].' WHERE id='.$my['id'].' LIMIT 1;');
    }
    if ($battle['dist']==1){
      db_query('UPDATE game_battle SET `dist`=0 WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
      $my['moddeystvie']--;
      db_query('UPDATE game_user SET `moddeystvie`='.$my['moddeystvie'].' WHERE id='.$my['id'].' LIMIT 1;');
    }
  }

  //удаление боя;
  if (($my['Hod']==21)&&($hod==3)){
    //db_query('UPDATE `game_user` SET `Hod` = "0" WHERE id = '.$my['id'].' LIMIT 1;');
    //db_query('UPDATE `game_user` SET `Hod` = "0" WHERE id = '.$enemy['id'].' LIMIT 1;');
    db_query('UPDATE game_battle SET `end`=1,`WinUser`='.AP.$my['name'].AP.',`LoseUser`= '.AP.$enemy['name'].AP.' WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
    db_query('DELETE  FROM `modificators` WHERE (`id`='.$my['id'].') OR (`id`='.$enemy['id'].')');
  }
  if (($my['Hod']==20)&&($hod==3)){
    //db_query('UPDATE `game_user` SET `Hod` = "0" WHERE id = '.$my['id'].' LIMIT 1;');
    //db_query('UPDATE `game_user` SET `Hod` = "0" WHERE id = '.$enemy['id'].' LIMIT 1;');
    db_query('UPDATE game_battle SET `end`=1,`WinUser`='.AP.$enemy['name'].AP.',`LoseUser`= '.AP.$my['name'].AP.' WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
    db_query('DELETE  FROM `modificators` WHERE (`id`='.$my['id'].') OR (`id`='.$enemy['id'].')');
  }

  //если ХОД =1 то идет грок сделал ход... теперь рассмотрим что он сыграл и сделаем И в какую ФАЗУ
  //игрок помер
  if ($my['Smert']==1){
    $my['Hod']=20;
    db_query('UPDATE `game_user` SET `Hod` = "20" WHERE id = '.$my['id'].' LIMIT 1;');
    db_query('UPDATE `game_user` SET `Hod` = "21" WHERE id = '.$enemy['id'].' LIMIT 1;');
    //db_query('UPDATE game_battle SET `end`=1,`WinUser`='.AP.$enemy['name'].AP.',`LoseUser`= '.AP.$my['name'].AP.' WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
    db_query('UPDATE `game_user` SET `lasthod` = "",`carapina`=0,`legkoe`=0,`srednee`=0,`tyageloe`=0,`smertelnoe`=0,`smert`=0,`stoyka` = "",`technic` = "",`modranenie`=0,`moddeystvie`=0  WHERE id = '.$my['id'].' LIMIT 1;');
    db_query('UPDATE `game_user` SET `lasthod` = "",`carapina`=0,`legkoe`=0,`srednee`=0,`tyageloe`=0,`smertelnoe`=0,`smert`=0,`stoyka` = "",`technic` = "",`modranenie`=0,`moddeystvie`=0   WHERE id = '.$enemy['id'].' LIMIT 1;');
    db_query('DELETE  FROM `modificators` WHERE (`id`='.$my['id'].') OR (`id`='.$enemy['id'].')');
  }

  //игрок сдался
  if (($hod==2)&&($my['Hod']!=0)&&($enemy['Hod']!=0)){
    db_query('UPDATE `game_user` SET `Hod` = "20" WHERE id = '.$my['id'].' LIMIT 1;');
    db_query('UPDATE `game_user` SET `Hod` = "21" WHERE id = '.$enemy['id'].' LIMIT 1;');
    //db_query('UPDATE game_battle SET `end`=1,`WinUser`='.AP.$enemy['name'].AP.',`LoseUser`= '.AP.$my['name'].AP.' WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
    db_query('UPDATE `game_user` SET `lasthod` = "",`carapina`=0,`legkoe`=0,`srednee`=0,`tyageloe`=0,`smertelnoe`=0,`smert`=0,`stoyka` = "",`technic` = "",`modranenie`=0,`moddeystvie`=0   WHERE id = '.$my['id'].' LIMIT 1;');
    db_query('UPDATE `game_user` SET `lasthod` = "",`carapina`=0,`legkoe`=0,`srednee`=0,`tyageloe`=0,`smertelnoe`=0,`smert`=0,`stoyka` = "",`technic` = "",`modranenie`=0,`moddeystvie`=0   WHERE id = '.$enemy['id'].' LIMIT 1;');
    db_query('DELETE  FROM `modificators` WHERE (`id`='.$my['id'].') OR (`id`='.$enemy['id'].')');
  }

     //ФАЗА 0
  if (($my['Hod']==0)&&($enemy['Hod']==0)){
    //обновим время
    db_query('UPDATE `game_user` SET `lasttime` = '.time().' WHERE (id = '.$my['id'].' OR id = '.$enemy['id'].') ;');

    //Бросок инициативы
    $log=$battle['log'];

    $my_inic=$my['Lovkost']+$my['Mishlenie'];
    $enemy_inic=$enemy['Lovkost']+$enemy['Mishlenie'];

    $re_my_inic=$my_inic+rand(1,6);
    $re_enemy_inic=$enemy_inic+rand(1,6);

    $log=$log."<b>Бросок инициативы</b> \n";

    $log =$log."Результат: \n".$my['name'].": Равен ".$re_my_inic."\n".$enemy['name'].": Равен ".$re_enemy_inic."\n";

    if ($re_my_inic>$re_enemy_inic){ //смотрим кому повезло - тот и первый
      $log =$log.$my['name']." Ходит первым \n";
      db_query('UPDATE `game_user` SET `Hod` = "1",`modranenie`=0,`moddeystvie`=0  WHERE id = '.$my['id'].' LIMIT 1;');
      db_query('UPDATE `game_user` SET `Hod` = "2",`modranenie`=0,`moddeystvie`=0  WHERE id = '.$enemy['id'].' LIMIT 1;');
    }else{
      $log =$log.$enemy['name']." Ходит первым \n";
      db_query('UPDATE `game_user` SET `Hod` = "2",`modranenie`=0,`moddeystvie`=0  WHERE id = '.$my['id'].' LIMIT 1;');
      db_query('UPDATE `game_user` SET `Hod` = "1",`modranenie`=0,`moddeystvie`=0  WHERE id = '.$enemy['id'].' LIMIT 1;');
    }

    db_query('UPDATE `game_battle` SET `log` = "'.$log.'" WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');

    //Сортируем руку и берем карты из колоды для 1 игрока
    db_query('SELECT * FROM koloda WHERE   id = '.$my['id'].' LIMIT 1;');
    $koloda = db_fetch();

    $arr = array();
    db_query('SELECT * FROM Hend WHERE (id='.$my['id'].') LIMIT 1;');
    $hend = db_fetch();

    //удаляем карты из начала, если не получается добрать карт
    $j=0;
    for ($i=1; $i<=($my['Obrazovanie']*3); $i++){
      if ($hend[$i]<>""){$j++;}
    }
    $sbros=$my['Obrazovanie']-(($my['Obrazovanie']*3)-$j);
    for ($i=1; $i<=($sbros);$i++){
      $hend[$i]="";
    }
    //сортируе руку убирая пустые
    $j=1;
    for ($i=1; $i<=($my['Obrazovanie']*3); $i++){if ($hend[$i]<>""){$arr[$j]=$hend[$i];$j++;}}
    for ($i=1; $i<=$my['Obrazovanie']; $i++)
    {
   
    
    $arr[$j]=$koloda[rand(1,30)];
   // $koloda[$i]="";
    $j++;
    db_query('UPDATE koloda SET `'.$i.'` = "" WHERE id = '.$my['id'].' LIMIT 1;');
    
    
    }
    
     
    for ($i=1; $i<=($my['Obrazovanie']*3); $i++)db_query('UPDATE `Hend` SET `'.$i.'` = "'.$arr[$i].'" WHERE id = '.$my['id'].' LIMIT 1;');
    $arr = array();
    $j=1;
    for ($i=1; $i<=30; $i++){if ($koloda[$i]<>""){$arr[$j]=$koloda[$i];$j++;}}
    for ($i=1; $i<=30; $i++)db_query('UPDATE `koloda` SET `'.$i.'` = "'.$arr[$i].'" WHERE id = '.$my['id'].' LIMIT 1;');
    
    //конец сортировки карт!!!
    //Сортируем руку и берем карты из колоды для 2 игрока
     db_query('SELECT * FROM koloda WHERE   id = '.$enemy['id'].' LIMIT 1;');
     $koloda = db_fetch();
    
    $arr = array();
    db_query('SELECT * FROM Hend WHERE (id='.$enemy['id'].') LIMIT 1;');
    $ehend = db_fetch();
   
    $j=0;
    for ($i=1; $i<=($enemy['Obrazovanie']*3); $i++){if ($ehend[$i]<>""){$j++;}}
    $sbros=$enemy['Obrazovanie']-(($enemy['Obrazovanie']*3)-$j);
    for ($i=1; $i<=$sbros;$i++)
    {
    $ehend[$i]="";
    }
  
    $j=1;
    for ($i=1; $i<=($enemy['Obrazovanie']*3); $i++){if ($ehend[$i]<>""){$arr[$j]=$ehend[$i];$j++;}}
    for ($i=1; $i<=$enemy['Obrazovanie']; $i++)
    {
     
    $arr[$j]=$koloda[rand(1,30)];
   // $koloda[$i]="";
    $j++;
    db_query('UPDATE koloda SET `'.$i.'` = "" WHERE id = '.$enemy['id'].' LIMIT 1;');
    
    
  
    }
    
     
    for ($i=1; $i<=($enemy['Obrazovanie']*3); $i++)db_query('UPDATE `Hend` SET `'.$i.'` = "'.$arr[$i].'" WHERE id = '.$enemy['id'].' LIMIT 1;');
    $arr = array();
    $j=1;
    for ($i=1; $i<=30; $i++){if ($koloda[$i]<>""){$arr[$j]=$koloda[$i];$j++;}}
    for ($i=1; $i<=30; $i++)db_query('UPDATE `koloda` SET `'.$i.'` = "'.$arr[$i].'" WHERE id = '.$enemy['id'].' LIMIT 1;');
    
    //конец сортировки карт!!!
           
    }
    
    //ФАЗА 1
    
    
    //Пропуск хода 1м игроком
    if (($hod==1)&&($my['Hod']==1)&&($myhod[1]==0)&&($myhod[2]==0)&&($myhod[3]==0)&&($myhod[4]==0))
    {
    //обновим время
     db_query('UPDATE `game_user` SET `lasttime` = '.time().' WHERE (id = '.$my['id'].' OR id = '.$enemy['id'].') ;');
     
  //передача хода и запись самого хода
     $log=$battle['log']; 
      
     $log=$log.$my['name']." Ничего не делает, это шанс для ".$enemy['name']." что бы ответить \n";
  
     db_query('UPDATE `game_battle` SET `log` = "'.$log.'" WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
     
     db_query('UPDATE `game_user` SET `Hod` = "7" WHERE id = '.$my['id'].' LIMIT 1;');
     db_query('UPDATE `game_user` SET `Hod` = "8" WHERE id = '.$enemy['id'].' LIMIT 1;');
    }
   
    if (($hod==1)&&($my['Hod']==1)&&(($myhod[1]!=0)||($myhod[2]!=0)||($myhod[3]!=0)||($myhod[4]!=0)))
    {
     //обновим время
     db_query('UPDATE `game_user` SET `lasttime` = '.time().' WHERE (id = '.$my['id'].' OR id = '.$enemy['id'].') ;');
     
  //передача хода и запись самого хода
     db_query('UPDATE `game_user` SET `Hod` = "3" WHERE id = '.$my['id'].' LIMIT 1;');
     db_query('UPDATE `game_user` SET `Hod` = "4" WHERE id = '.$enemy['id'].' LIMIT 1;');
     
     for ($i=1; $i<5; $i++)
        {
  
        $lasthod=$lasthod.$hend[$myhod[$i]].";";
         }
      db_query('UPDATE `game_user` SET `lasthod` = "'.$lasthod.'" WHERE id = '.$my['id'].' LIMIT 1;');
    //Стирание использованных карт из руки
     for ($i=1; $i<5; $i++)
     {
     if ($myhod[$i]!=0)
     {
      db_query('UPDATE `Hend` SET `'.$myhod[$i].'` = "" WHERE id = '.$my['id'].' LIMIT 1;');
     }
     }
     //сортировка руки и запись руки уже с удаленными картами из нее
    $arr = array();
    db_query('SELECT * FROM Hend WHERE (id='.$my['id'].') LIMIT 1;');
    $hend = db_fetch();  
    $j=1;
    for ($i=1; $i<16; $i++){if ($hend[$i]<>""){$arr[$j]=$hend[$i];$j++;}}
    for ($i=1; $i<16; $i++)db_query('UPDATE `Hend` SET `'.$i.'` = "'.$arr[$i].'" WHERE id = '.$my['id'].' LIMIT 1;');
    
    }
    //ФАЗА 2
    
    
   
    if (($hod==1)&&($my['Hod']==4))
    {
    //обновим время
     db_query('UPDATE `game_user` SET `lasttime` = '.time().' WHERE (id = '.$my['id'].' OR id = '.$enemy['id'].') ;');
     
  //передача хода и запись самого хода
     db_query('UPDATE `game_user` SET `Hod` = "6" WHERE id = '.$my['id'].' LIMIT 1;');
     db_query('UPDATE `game_user` SET `Hod` = "5" WHERE id = '.$enemy['id'].' LIMIT 1;');
    
     for ($i=1; $i<5; $i++)
        {
        $lasthod=$lasthod.$hend[$myhod[$i]].";";
  
        }
      db_query('UPDATE `game_user` SET `lasthod` = "'.$lasthod.'" WHERE id = '.$my['id'].' LIMIT 1;');
     
    //include ($hend[$myhod[1]].".php");
    
    //Стирание использованных карт из руки
     for ($i=1; $i<5; $i++)
     {
      if ($myhod[$i]!=0)
     {
      db_query('UPDATE `Hend` SET `'.$myhod[$i].'` = "" WHERE id = '.$my['id'].' LIMIT 1;');
     }
     }
     //сортировка руки и запись руки уже с удаленными картами из нее
    $arr = array();
    db_query('SELECT * FROM Hend WHERE (id='.$my['id'].') LIMIT 1;');
    $hend = db_fetch();  
    $j=1;
    for ($i=1; $i<16; $i++){if ($hend[$i]<>""){$arr[$j]=$hend[$i];$j++;}}
    for ($i=1; $i<16; $i++)db_query('UPDATE `Hend` SET `'.$i.'` = "'.$arr[$i].'" WHERE id = '.$my['id'].' LIMIT 1;');
    
    
    
     //РАСЧЕТ БОЯ
     
  
    //открытие лог файла
    $log=$battle['log'];
  
                 
    $myhod=split(";",$lasthod);
    $enemyhod=split(";",$enemy['lasthod']);
    
    
     
    if (($myhod[0]!="")or($enemyhod[0]!="")){$log=$log."<b>Первое действие</b> \n";$mov++;}
     
    $first=$my['name'];
    $second=$enemy['name'];

    if ($myhod[0]!=""){include ("kartscript/".$myhod[0].".php");}
    
    $first=$enemy['name'];
    $second=$my['name'];
    
    if ($enemyhod[0]!=""){include ("kartscript/".$enemyhod[0].".php");}
     
    if (($myhod[1]!="")or($enemyhod[1]!="")){$log=$log."<b>Второе действие</b> \n";$mov++;}
    
     
    $first=$my['name'];
    $second=$enemy['name'];

    if ($myhod[1]!=""){include ("kartscript/".$myhod[1].".php");}
    
    $first=$enemy['name'];
    $second=$my['name'];
    
    if ($enemyhod[1]!=""){include ("kartscript/".$enemyhod[1].".php");}
     
    if (($myhod[2]!="")or($enemyhod[2]!="")){$log=$log."<b>Третье действие</b> \n";$mov++;}
     
    $first=$my['name'];
    $second=$enemy['name'];

    if ($myhod[2]!=""){include ("kartscript/".$myhod[2].".php");}
    
    $first=$enemy['name'];
    $second=$my['name'];
    
    if ($enemyhod[2]!=""){include ("kartscript/".$enemyhod[2].".php");}
     
    if (($myhod[3]!="")or($enemyhod[3]!="")){$log=$log."<b>Четвертое действие</b> \n";$mov++;}
     
    $first=$my['name'];
    $second=$enemy['name'];

    if ($myhod[3]!=""){include ("kartscript/".$myhod[3].".php");}
    
    $first=$enemy['name'];
    $second=$my['name'];
    
    if ($enemyhod[3]!=""){include ("kartscript/".$enemyhod[3].".php");}
     
    
    
    
    
    db_query('UPDATE `game_user` SET `Carapina` = '.$my['Carapina'].',`Legkoe` = '.$my['Legkoe'].',`Srednee` = '.$my['Srednee'].',`Tyageloe` = '.$my['Tyageloe'].',`Smertelnoe` = '.$my['Smertelnoe'].',`Smert` = '.$my['Smert'].',`moddeystvie` = '.$my['moddeystvie'].',`modranenie` = '.$my['modranenie'].' WHERE id='.$my['id'].'  LIMIT 1;');
    db_query('UPDATE `game_user` SET `Carapina` = '.$enemy['Carapina'].',`Legkoe` = '.$enemy['Legkoe'].',`Srednee` = '.$enemy['Srednee'].',`Tyageloe` = '.$enemy['Tyageloe'].',`Smertelnoe` = '.$enemy['Smertelnoe'].',`Smert` = '.$enemy['Smert'].',`moddeystvie` = '.$enemy['moddeystvie'].',`modranenie` = '.$enemy['modranenie'].' WHERE id='.$enemy['id'].'  LIMIT 1;');
    db_query('UPDATE `game_battle` SET `log` = "'.$log.'" WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
   

    
   
  
    ///Конец расчета боя
    
    
    }
    
    //ФАЗА 3
    if (($hod==1)&&($my['Hod']==5))
    {
    //обновим время
     db_query('UPDATE `game_user` SET `lasttime` = '.time().' WHERE (id = '.$my['id'].' OR id = '.$enemy['id'].') ;');
     
  //передача хода и запись самого хода
     db_query('UPDATE `game_user` SET `Hod` = "13" WHERE id = '.$my['id'].' LIMIT 1;');
  
  
}
    
    //ФАЗА ОЖИДАНИЯ РЕЗУЛЬТАТА
    if (($hod==1)&&($my['Hod']==6))
    {
    //обновим время
     db_query('UPDATE `game_user` SET `lasttime` = '.time().' WHERE (id = '.$my['id'].' OR id = '.$enemy['id'].') ;');
     
  //передача хода и запись самого хода
     db_query('UPDATE `game_user` SET `Hod` = "14" WHERE id = '.$my['id'].' LIMIT 1;');
   //удаление инфы о ходах
  
    }
    
    //Ожидание игроков после хода первого игрока
    if (($enemy['Hod']==14)&&($my['Hod']==13))
    {
  //передача хода и запись самого хода
     db_query('UPDATE `game_user` SET `Hod` = "1" WHERE id = '.$my['id'].' LIMIT 1;');
     db_query('UPDATE `game_user` SET `Hod` = "2" WHERE id = '.$enemy['id'].' LIMIT 1;');
     db_query('UPDATE `game_user` SET `lasthod` = "" WHERE id = '.$my['id'].' LIMIT 1;');
     db_query('UPDATE `game_user` SET `lasthod` = "" WHERE id = '.$enemy['id'].' LIMIT 1;');
    }
    
   
    
    //ФАЗА 4
 
 
  
    if (($hod==1)&&($my['Hod']==8)&&(($myhod[1]!=0)||($myhod[2]!=0)||($myhod[3]!=0)||($myhod[4]!=0)))
    { 
    //обновим время
     db_query('UPDATE `game_user` SET `lasttime` = '.time().' WHERE (id = '.$my['id'].' OR id = '.$enemy['id'].') ;');
     
  //передача хода и запись самого хода
     db_query('UPDATE `game_user` SET `Hod` = "10" WHERE id = '.$my['id'].' LIMIT 1;');
     db_query('UPDATE `game_user` SET `Hod` = "9" WHERE id = '.$enemy['id'].' LIMIT 1;');
    
     for ($i=1; $i<5; $i++)
        {
        $lasthod=$lasthod.$hend[$myhod[$i]].";";
  
        }
      db_query('UPDATE `game_user` SET `lasthod` = "'.$lasthod.'" WHERE id = '.$my['id'].' LIMIT 1;');
    //Стирание использованных карт из руки
     for ($i=1; $i<5; $i++)
     {
      if ($myhod[$i]!=0)
     {
      db_query('UPDATE `Hend` SET `'.$myhod[$i].'` = "" WHERE id = '.$my['id'].' LIMIT 1;');
     } 
     }
     //сортировка руки и запись руки уже с удаленными картами из нее
    $arr = array();
    db_query('SELECT * FROM Hend WHERE (id='.$my['id'].') LIMIT 1;');
    $hend = db_fetch();  
    $j=1;
    for ($i=1; $i<16; $i++){if ($hend[$i]<>""){$arr[$j]=$hend[$i];$j++;}}
    for ($i=1; $i<16; $i++)db_query('UPDATE `Hend` SET `'.$i.'` = "'.$arr[$i].'" WHERE id = '.$my['id'].' LIMIT 1;');
        
    }
    
    //Пропуск хода 2м игроком
    if (($hod==1)&&($my['Hod']==8)&&($myhod[1]==0)&&($myhod[2]==0)&&($myhod[3]==0)&&($myhod[4]==0))
    {
    //обновим время
     db_query('UPDATE `game_user` SET `lasttime` = '.time().' WHERE (id = '.$my['id'].' OR id = '.$enemy['id'].') ;');
     
  //передача хода и запись самого хода
     $log=$battle['log']; 
      
     $log=$log.$my['name']." Ничего не делает, пора решить кто ходит первым \n";
  
     db_query('UPDATE `game_battle` SET `log` = "'.$log.'" WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
    
     db_query('UPDATE `game_user` SET `Hod` = "0" WHERE id = '.$my['id'].' LIMIT 1;');
     db_query('UPDATE `game_user` SET `Hod` = "0" WHERE id = '.$enemy['id'].' LIMIT 1;');
    }
    
    //ФАЗА 5
       
    if (($hod==1)&&($my['Hod']==9))
    {
    //обновим время
     db_query('UPDATE `game_user` SET `lasttime` = '.time().' WHERE (id = '.$my['id'].' OR id = '.$enemy['id'].') ;');
     
  //передача хода и запись самого хода
     db_query('UPDATE `game_user` SET `Hod` = "11" WHERE id = '.$my['id'].' LIMIT 1;');
     db_query('UPDATE `game_user` SET `Hod` = "12" WHERE id = '.$enemy['id'].' LIMIT 1;');
     
     for ($i=1; $i<5; $i++)
        {
        $lasthod=$lasthod.$hend[$myhod[$i]].";";
  
        }
      db_query('UPDATE `game_user` SET `lasthod` = "'.$lasthod.'" WHERE id = '.$my['id'].' LIMIT 1;');
    //Стирание использованных карт из руки
     for ($i=1; $i<5; $i++)
     {
      if ($myhod[$i]!=0)
     {
      db_query('UPDATE `Hend` SET `'.$myhod[$i].'` = "" WHERE id = '.$my['id'].' LIMIT 1;');
     } 
     }
     //сортировка руки и запись руки уже с удаленными картами из нее
    $arr = array();
    db_query('SELECT * FROM Hend WHERE (id='.$my['id'].') LIMIT 1;');
    $hend = db_fetch();  
    $j=1;
    for ($i=1; $i<16; $i++){if ($hend[$i]<>""){$arr[$j]=$hend[$i];$j++;}}
    for ($i=1; $i<16; $i++)db_query('UPDATE `Hend` SET `'.$i.'` = "'.$arr[$i].'" WHERE id = '.$my['id'].' LIMIT 1;');
    
    
     //РАСЧЕТ БОЯ
     
  
    //открытие лог файла
    $log=$battle['log'];
  
                 
    //Тут нужно написать обработчик с инклудами
    //$my['lasthod']=$lasthod;
    
    $myhod=split(";",$lasthod);
    $enemyhod=split(";",$enemy['lasthod']);
    
    
     
     if (($myhod[0]!="")or($enemyhod[0]!="")){$log=$log."<b>Первое действие</b> \n";$mov++;}
     
    $first=$my['name'];
    $second=$enemy['name'];

    if ($myhod[0]!=""){include ("kartscript/".$myhod[0].".php");}
    
    $first=$enemy['name'];
    $second=$my['name'];
    
    if ($enemyhod[0]!=""){include ("kartscript/".$enemyhod[0].".php");}
     
    if (($myhod[1]!="")or($enemyhod[1]!="")){$log=$log."<b>Второе действие</b> \n";$mov++;}
    
     
    $first=$my['name'];
    $second=$enemy['name'];

    if ($myhod[1]!=""){include ("kartscript/".$myhod[1].".php");}
    
    $first=$enemy['name'];
    $second=$my['name'];
    
    if ($enemyhod[1]!=""){include ("kartscript/".$enemyhod[1].".php");}
     
    if (($myhod[2]!="")or($enemyhod[2]!="")){$log=$log."<b>Третье действие</b> \n";$mov++;}
     
    $first=$my['name'];
    $second=$enemy['name'];

    if ($myhod[2]!=""){include ("kartscript/".$myhod[2].".php");}
    
    $first=$enemy['name'];
    $second=$my['name'];
    
    if ($enemyhod[2]!=""){include ("kartscript/".$enemyhod[2].".php");}
     
    if (($myhod[3]!="")or($enemyhod[3]!="")){$log=$log."<b>Четвертое действие</b> \n";$mov++;}
     
    $first=$my['name'];
    $second=$enemy['name'];

    if ($myhod[3]!=""){include ("kartscript/".$myhod[3].".php");}
    
    $first=$enemy['name'];
    $second=$my['name'];
    
    if ($enemyhod[3]!=""){include ("kartscript/".$enemyhod[3].".php");}
     
    
    db_query('UPDATE `game_user` SET `Carapina` = '.$enemy['Carapina'].',`Legkoe` = '.$enemy['Legkoe'].',`Srednee` = '.$enemy['Srednee'].',`Tyageloe` = '.$enemy['Tyageloe'].',`Smertelnoe` = '.$enemy['Smertelnoe'].',`Smert` = '.$enemy['Smert'].',`moddeystvie` = '.$enemy['moddeystvie'].',`modranenie` = '.$enemy['modranenie'].' WHERE id='.$enemy['id'].'  LIMIT 1;');
    db_query('UPDATE `game_user` SET `Carapina` = '.$my['Carapina'].',`Legkoe` = '.$my['Legkoe'].',`Srednee` = '.$my['Srednee'].',`Tyageloe` = '.$my['Tyageloe'].',`Smertelnoe` = '.$my['Smertelnoe'].',`Smert` = '.$my['Smert'].',`moddeystvie` = '.$my['moddeystvie'].',`modranenie` = '.$my['modranenie'].' WHERE id='.$my['id'].'  LIMIT 1;');
    db_query('UPDATE `game_battle` SET `log` = "'.$log.'" WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
   

    
   
  
    ///Конец расчета боя
    
    }
      if (($hod==1)&&($my['Hod']==11))
    {
    //обновим время
     db_query('UPDATE `game_user` SET `lasttime` = '.time().' WHERE (id = '.$my['id'].' OR id = '.$enemy['id'].') ;');
     
  //передача хода и запись самого хода
     db_query('UPDATE `game_user` SET `Hod` = "15" WHERE id = '.$my['id'].' LIMIT 1;');
   //удаление инфы о ходах
    }
    if (($hod==1)&&($my['Hod']==12))
    {
    //обновим время
     db_query('UPDATE `game_user` SET `lasttime` = '.time().' WHERE (id = '.$my['id'].' OR id = '.$enemy['id'].') ;');
     
  //передача хода и запись самого хода
     db_query('UPDATE `game_user` SET `Hod` = "16" WHERE id = '.$my['id'].' LIMIT 1;');
     //удаление инфы о ходах
  
    //include ("sorthend.php");
    }
      //Ожидание игроков после хода первого игрока
    if (($enemy['Hod']==16)&&($my['Hod']==15))
    {
    //обновим время
     db_query('UPDATE `game_user` SET `lasttime` = '.time().' WHERE (id = '.$my['id'].' OR id = '.$enemy['id'].') ;');
     
  //передача хода и запись самого хода
     db_query('UPDATE `game_user` SET `Hod` = "7" WHERE id = '.$my['id'].' LIMIT 1;');
     db_query('UPDATE `game_user` SET `Hod` = "8" WHERE id = '.$enemy['id'].' LIMIT 1;');
     db_query('UPDATE `game_user` SET `lasthod` = "" WHERE id = '.$my['id'].' LIMIT 1;');
     db_query('UPDATE `game_user` SET `lasthod` = "" WHERE id = '.$enemy['id'].' LIMIT 1;');
    }
        
    
    
    
    /// вывод инфы для флеша....
  db_query('SELECT * FROM game_user WHERE userid='.AP.$my['userid'].AP.' LIMIT 1;');
  $my = db_fetch();
  db_query('SELECT * FROM game_user WHERE id='.$enemy['id'].' LIMIT 1;');
  $enemy = db_fetch();
  db_query('SELECT * FROM game_battle WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
  $battle = db_fetch();
  include ("mods.php");
  db_query('SELECT * FROM Hend WHERE (id='.$my['id'].') LIMIT 1;');
  $hend = db_fetch();
  
  echo "kart=";
        for ($i=0; $i<=($my['Obrazovanie']*3)+1; $i++)
        { if ($hend[$i]<>"")
        echo ''.$hend[$i].';';
        }
  echo "&hod=".$my['Hod'];
  echo "&enemyhod=".$enemy['lasthod'];
  echo "&myhod=".$my['lasthod'];
  
  echo "&mytechnic=".$my['technic'];
  echo "&mystoyka=".$my['stoyka'];
  echo "&enemytechnic=".$enemy['technic'];
  echo "&enemystoyka=".$enemy['stoyka'];
  
  echo "&myname=".$my['name'];
  echo "&mysila=".$my['Sila'];
  echo "&mylovkost=".$my['Lovkost'];
  echo "&mymishlenie=".$my['Mishlenie'];
  echo "&myobrazovanie=".$my['Obrazovanie'];
  echo "&myimage=".$my['image'];
  echo "&mycarapina=".$my['Carapina'];
  echo "&mylegkoe=".$my['Legkoe'];
  echo "&mysrednee=".$my['Srednee'];
  echo "&mytyageloe=".$my['Tyageloe'];
  echo "&mysmertelnoe=".$my['Smertelnoe'];
  echo "&mysmert=".$my['Smert'];
   
  
  echo "&mymods="."На действие;".$my['moddeystvie'].";"."На ранение;".$my['modranenie'].";"."На поподание;".$mymods['napopodanie'].";"."На повреждение;".$mymods['nadamage'].";"."На уклонение;".$mymods['nayklonenie'].";"."На блок;".$mymods['nablok'].";"."На броню;".$mymods['naarmor'].";"."На Поп ДУ;".$mymods['napopdaludaru'].";"."На Пов ДУ;".$mymods['napovdaludaru'].";"."На Поп БУ;".$mymods['napopblgudaru'].";"."На Пов БУ;".$mymods['napovblgudaru'].";"."На Поп ДУ рукой ;".$mymods['napopdaludarrukoy'].";"."На Пов ДУ рукой ;".$mymods['napovdaludarrukoy'].";"."На Поп БУ рукой ;".$mymods['napopblgudarrukoy'].";"."На Пов БУ рукой ;".$mymods['napovblgudarrukoy'].";"."На Поп ДУ ногой ;".$mymods['napopdaludarnogoy'].";"."На Пов ДУ ногой ;".$mymods['napovdaludarnogoy'].";"."На Поп БУ ногой ;".$mymods['napopblgudarnogoy'].";"."На Пов БУ ногой ;".$mymods['napovblgudarnogoy'].";"."На Поп в голову;".$mymods['napopvgolovu'].";"."На Пов в голову;".$mymods['napovvgolovu'].";"."На Поп в руку;".$mymods['napopvruku'].";"."На Пов в руку;".$mymods['napovvruku'].";"."На Поп в торс;".$mymods['napopvtors'].";"."На Пов в торс;".$mymods['napovvtors'].";"."На Поп в ногу;".$mymods['napopvnogu'].";"."На Пов в ногу;".$mymods['napovvnogu'].";";
  echo "&myskillssila="."БОКС;".$my['Boks'].";";
  echo "&myskillslovkost="."ШК(КРАСНАЯ);".$my['schoolred'].";"."ШК(СИНЯЯ);".$my['schoolblue'].";"."ШК(ЗЕЛЕНАЯ);".$my['schoolgreen'].";"."ШК(БЕЛАЯ);".$my['schoolwhite'].";"."ШК(ЧЕРНАЯ);".$my['schoolblack'].";";
  
  echo "&enemyname=".$enemy['name'];
  echo "&enemysila=".$enemy['Sila'];
  echo "&enemylovkost=".$enemy['Lovkost'];
  echo "&enemymishlenie=".$enemy['Mishlenie'];
  echo "&enemyobrazovanie=".$enemy['Obrazovanie'];
  echo "&enemyimage=".$enemy['image'];
  echo "&enemycarapina=".$enemy['Carapina'];
  echo "&enemylegkoe=".$enemy['Legkoe'];
  echo "&enemysrednee=".$enemy['Srednee'];
  echo "&enemytyageloe=".$enemy['Tyageloe'];
  echo "&enemysmertelnoe=".$enemy['Smertelnoe'];
  echo "&enemysmert=".$enemy['Smert'];
  
  echo "&enemymods="."На действие;".$enemy['moddeystvie'].";"."На ранение;".$enemy['modranenie'].";"."На поподание;".$enemymods['napopodanie'].";"."На повреждение;".$enemymods['nadamage'].";"."На уклонение;".$enemymods['nayklonenie'].";"."На блок;".$enemymods['nablok'].";"."На броню;".$enemymods['naarmor'].";"."На Поп ДУ;".$enemymods['napopdaludaru'].";"."На Пов ДУ;".$enemymods['napovdaludaru'].";"."На Поп БУ;".$enemymods['napopblgudaru'].";"."На Пов БУ;".$enemymods['napovblgudaru'].";"."На Поп ДУ рукой ;".$enemymods['napopdaludarrukoy'].";"."На Пов ДУ рукой ;".$enemymods['napovdaludarrukoy'].";"."На Поп БУ рукой ;".$enemymods['napopblgudarrukoy'].";"."На Пов БУ рукой ;".$enemymods['napovblgudarrukoy'].";"."На Поп ДУ ногой ;".$enemymods['napopdaludarnogoy'].";"."На Пов ДУ ногой ;".$enemymods['napovdaludarnogoy'].";"."На Поп БУ ногой ;".$enemymods['napopblgudarnogoy'].";"."На Пов БУ ногой ;".$enemymods['napovblgudarnogoy'].";"."На Поп в голову;".$enemymods['napopvgolovu'].";"."На Пов в голову;".$enemymods['napovvgolovu'].";"."На Поп в руку;".$enemymods['napopvruku'].";"."На Пов в руку;".$enemymods['napovvruku'].";"."На Поп в торс;".$enemymods['napopvtors'].";"."На Пов в торс;".$enemymods['napovvtors'].";"."На Поп в ногу;".$enemymods['napopvnogu'].";"."На Пов в ногу;".$enemymods['napovvnogu'].";"; 
  echo "&enemyskillssila="."БОКС;".$enemy['Boks'].";";
  echo "&enemyskillslovkost="."ШК(КРАСНАЯ);".$enemy['schoolred'].";"."ШК(СИНЯЯ);".$enemy['schoolblue'].";"."ШК(ЗЕЛЕНАЯ);".$enemy['schoolgreen'].";"."ШК(БЕЛАЯ);".$enemy['schoolwhite'].";"."ШК(ЧЕРНАЯ);".$enemy['schoolblack'].";";
  
  
  echo "&dist=".$battle['dist'];
  $time_end = getmicrotime();
  $time_d = round($time_end - $time_start,4);
  echo '&Время генерации странички: '.$time_d.' сек.';
  
?>
