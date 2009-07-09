<?php

if ($first == $my['name']) {
  $id = $my['id'];
  $schoolred = $my['schoolred'];
  $deystvie=-$my['moddeystvie'];
} else {
  $id = $enemy['id'];
  $schoolred = $enemy['schoolred'];
  $deystvie=-$enemy['moddeystvie'];
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
