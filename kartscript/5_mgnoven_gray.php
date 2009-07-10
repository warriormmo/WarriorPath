<?php
$log = $log . $first . " Использует технику Боевое перемещение .\n";
//разбор кому пренадлежит сгранная карта
if ($first == $my['name']) {
  $id = $my['id'];
  $my['resultat']=$my['resultat']."3;";
} else {
  $id = $enemy['id'];
  $enemy['resultat']=$enemy['resultat']."3;";
}
//что имеено происходит при отгреше карты
db_query('DELETE FROM `modificators` WHERE (`id`=' . $id . ') and (`technic`=1)'); //вытераем предыдущую стойку
db_query('UPDATE `game_user` SET `technic` = "5_mgnoven_gray" WHERE id = ' . $id . ' LIMIT 1;'); //занесение в базу в стойку

?>
