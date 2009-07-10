<?php
//разбор кому пренадлежит сгранная карта
if ($first == $my['name']) {
  $id = $my['id'];
  $schoolred = $my['schoolred'];
  if ($my['modranenie'] < 0) {
    $my['modranenie'] = 0;
    $rana = true;
  } else {
    $rana = false;
  }
  if (($schoolred > 0) & ($rana == true)){$my['resultat']=$my['resultat']."3;";}else{$my['resultat']=$my['resultat']."4;";}
} else {
  $id = $enemy['id'];
  $schoolred = $enemy['schoolred'];
  if ($enemy['modranenie'] < 0) {
    $enemy['modranenie'] = 0;
    $rana = true;
  } else {
    $rana = false;
  }
  if (($schoolred > 0) & ($rana == true)){$enemy['resultat']=$enemy['resultat']."3;";}else{$enemy['resultat']=$enemy['resultat']."4;";}
}
//что имеено происходит при отгреше карты
if (($schoolred > 0) & ($rana == true)) //карта требует красную школу
{
  $log = $log . $first . " вошел в состоянии Кровавая ярость.\n";
  db_query('UPDATE `game_user` SET `modranenie` = "0" WHERE id = ' . $id . ' LIMIT 1;');
  db_query('INSERT INTO `modificators`(id,time,nadamage,napopodanie)  VALUES (' . $id . ',1000,1,1)'); //занесение в моды
  
} else {
  $log = $log . $first . " пытался что-то изобразить.\n";
}
?>
