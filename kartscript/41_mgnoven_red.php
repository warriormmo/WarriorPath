<?php

if ($first == $my['name']) {
  $id = $my['id'];
  $schoolred = $my['schoolred'];
  $deystvie=-$my['moddeystvie'];
  if ($schoolred > 0){$my['resultat']=$my['resultat']."3;";}else{$my['resultat']=$my['resultat']."4;";}

} else {
  $id = $enemy['id'];
  $schoolred = $enemy['schoolred'];
  $deystvie=-$enemy['moddeystvie'];
  if ($schoolred > 0){$enemy['resultat']=$enemy['resultat']."3;";}else{$enemy['resultat']=$enemy['resultat']."4;";}

}
//что имеено происходит при отгреше карты
if ($schoolred > 0) //карта требует красную школу
{
   $log = $log . $first . " ринулся в бой со всех сил.\n";
   db_query('INSERT INTO `modificators`(id,time,nadeystvie)  VALUES (' . $id . ',1000,'.$deystvie.')'); //занесение в моды

} else {
  $log = $log . $first . " пытался что-то изобразить.\n";
}
?>
