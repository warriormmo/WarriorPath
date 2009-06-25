<?php
//разбор кому пренадлежит сгранная карта
if ($first == $my['name']) {
  $id = $my['id'];
  $schoolred = $my['schoolred'];
} else {
  $id = $enemy['id'];
  $schoolred = $enemy['schoolred'];
}
//что имеено происходит при отгреше карты
if ($schoolred > 0) //карта требует синюю школу
{
  $log = $log . $first . " использует технику Берсерк.\n";
  db_query('DELETE FROM `modificators` WHERE (`id`=' . $id . ') and (`technic`=1)'); //вытераем предыдущую технику
  db_query('UPDATE `game_user` SET `technic` = "35_mgnoven" WHERE id = ' . $id . ' LIMIT 1;'); //занесение в базу в технику
  db_query('INSERT INTO `modificators`(id,time,nadamage,napopodanie,nayklonenie,nablok,besstrashie,beschuvstvie,technic)  VALUES (' . $id . ',1000,1,1,-2,-2,1,1,1)'); //занесение в моды
  
} else {
  $log = $log . $first . " пытался что-то изобразить.\n";
}
?>
