<?php
  $log = $log . $first . " Встал в Атакующую позицию .\n";

  //разбор кому пренадлежит сгранная карта
  if ($first == $my['name']) {
    $id = $my['id'];
  } else {
    $id = $enemy['id'];
  }
  //что имеено происходит при отгреше карты

  //вытераем предыдущую стойку
  db_query('DELETE FROM `modificators` WHERE (`id`=' . $id . ') and (`stoyka`=1)');
  //занесение в базу в стойку
  db_query('UPDATE `game_user` SET `stoyka` = "4_mgnoven" WHERE id = ' . $id . ' LIMIT 1;');
  //занесение в моды
  db_query('INSERT INTO `modificators`(id,time,napopodanie,nayklonenie,nablok,stoyka)  VALUES (' . $id . ',1000,1,-1,-1,1)');
?>