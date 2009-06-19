<?php
  //разбор кому пренадлежит сгранная карта
  if ($first == $my['name']) {
    $id = $my['id'];
  } else {
    $id = $enemy['id'];
  }
  //что имеено происходит при отгреше карты
  $log = $log . $first . " развернулся.\n";
  //занесение в моды
  db_query('INSERT INTO `modificators`(id,time,nadamage,napopodanie,nayklonenie)  VALUES (' . $id . ',1000,2,-1,2)');
?>