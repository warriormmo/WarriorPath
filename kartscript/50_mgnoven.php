<?php
  //разбор кому пренадлежит сгранная карта
  if ($first == $my['name']) {
    $id = $my['id'];
    $schoolblue = $my['schoolblue'];
  } else {
    $id = $enemy['id'];
    $schoolblue = $enemy['schoolblue'];
  }
  //что имеено происходит при отгреше карты
  if ($schoolblue > 0) {
    //карта требует синюю школу
    $log = $log . $first . " использует технику змеи.\n";
    //вытераем предыдущую технику
    db_query('DELETE FROM `modificators` WHERE (`id`=' . $id . ') and (`technic`=1)');
    //занесение в базу в технику
    db_query('UPDATE `game_user` SET `technic` = "50_mgnoven" WHERE id = ' . $id . ' LIMIT 1;');
    //занесение в моды
    db_query('INSERT INTO `modificators`(id,time,napopodanie,technic)  VALUES (' . $id . ',1000,1,1)');
  } else {
    $log = $log . $first . " пытался что-то изобразить.\n";
  }
?>