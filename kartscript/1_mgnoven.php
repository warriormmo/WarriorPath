<?php
  $log = $log . "Хитрый " . $first . " Сгрупировался готовый принять любую атаку " . $second . ".\n";

  //разбор кому пренадлежит сгранная карта
  if ($first == $my['name']) {
    $id = $my['id'];
  } else {
    $id = $enemy['id'];
  }
  //что имеено происходит при отгреше карты

  //db_query('DELETE FROM `modificators` WHERE (`id`='.$id.') and (`stoyka`=1)');//вытераем предыдущую стойку
  //db_query('UPDATE `game_user` SET `stoyka` = "3_mgnoven" WHERE id = '.$id.' LIMIT 1;');  //занесение в базу в стойку
  //занесение в моды
  db_query('INSERT INTO `modificators`(id,time,nablok)  VALUES (' . $id . ',1000,3)');
?>