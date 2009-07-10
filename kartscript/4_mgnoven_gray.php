<?php
$log = $log . $first . " Встал в Атакующую позицию .\n";
//разбор кому пренадлежит сгранная карта
if ($first == $my['name']) {
  $id = $my['id'];
  $my['resultat']=$my['resultat']."3;";
} else {
  $id = $enemy['id'];
  $enemy['resultat']=$enemy['resultat']."3;";
}
//что имеено происходит при отгреше карты
db_query('DELETE FROM `modificators` WHERE (`id`=' . $id . ') and (`stoyka`=1)'); //вытераем предыдущую стойку
db_query('UPDATE `game_user` SET `stoyka` = "4_mgnoven_gray" WHERE id = ' . $id . ' LIMIT 1;'); //занесение в базу в стойку
db_query('INSERT INTO `modificators`(id,time,napopodanie,nayklonenie,nablok,stoyka)  VALUES (' . $id . ',1000,1,-1,-1,1)'); //занесение в моды

?>
