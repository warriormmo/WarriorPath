<?php
//разбор кому пренадлежит сгранная карта
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
if ($schoolred > 0) //карта требует синюю школу
{
  $log = $log . $first . " использует технику Лапа тигра.\n";
  db_query('DELETE FROM `modificators` WHERE (`id`=' . $id . ') and (`technic`=1)'); //вытераем предыдущую технику
  db_query('UPDATE `game_user` SET `technic` = "38_mgnoven_red" WHERE id = ' . $id . ' LIMIT 1;'); //занесение в базу в технику
  db_query('INSERT INTO `modificators`(id,time,napovblgudarrukoy,napovdaludarrukoy,technic)  VALUES (' . $id . ',1000,2,2,1)'); //занесение в моды
  
} else {
  $log = $log . $first . " пытался что-то изобразить.\n";
}
?>
