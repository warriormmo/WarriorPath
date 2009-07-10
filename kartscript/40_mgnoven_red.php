<?php
$log = $log . $first . " Встал в стойку Глухая защита.\n";
if ($first == $my['name']) {
  $id = $my['id'];
  $schoolred = $my['schoolred'];
    if ($schoolred > 0){$my['resultat']=$my['resultat']."3;";}else{$my['resultat']=$my['resultat']."4;";}

} else {
  $id = $enemy['id'];
  $schoolred = $enemy['schoolred'];
    if ($schoolred > 0){$enemy['resultat']=$enemy['resultat']."3;";}else{$enemy['resultat']=$enemy['resultat']."4;";}

}
//что имеено происходит при отгреше карты
if ($schoolred > 0) //карта требует красную школу
{
  db_query('DELETE FROM `modificators` WHERE (`id`=' . $id . ') and (`stoyka`=1)'); //вытераем предыдущую стойку
  db_query('UPDATE `game_user` SET `stoyka` = "40_mgnoven_red" WHERE id = ' . $id . ' LIMIT 1;'); //занесение в базу в стойку
  db_query('INSERT INTO `modificators`(id,time,nadamage,napopodanie,nayklonenie,nablok,stoyka)  VALUES (' . $id . ',1000,-2,-3,3,3,1)'); //занесение в моды
  
} else {
  $log = $log . $first . " пытался что-то изобразить.\n";
}
?>
