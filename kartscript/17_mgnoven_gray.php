<?php
include ("mods.php");
//разбор кому пренадлежит сгранная карта
if ($first == $my['name']) {
  $id = $my['id'];
  //что имеено происходит при отгреше карты
  if ($mymods['prigok']==0)
  {
    $log = $log . $first . " подпрыгнул.\n";
    db_query('INSERT INTO `modificators`(id,time,nadamage,nayklonenie,nablok,prigok)  VALUES (' . $id . ',1000,2,2,2,1)'); //занесение в моды
  $mymods['prigok']=1;
  }else
  {
    $log = $log . $first . " Попытался оттолкнуться от воздуха, но не вышло.\n";
  }
  

} else {
  $id = $enemy['id'];
   if ($enemymods['prigok']==0)
  {
    $log = $log . $first . " подпрыгнул.\n";
    db_query('INSERT INTO `modificators`(id,time,nadamage,nayklonenie,nablok,prigok)  VALUES (' . $id . ',1000,2,2,2,1)'); //занесение в моды
    $enemymods['prigok']=1;
  }else
  {
    $log = $log . $first . " Попытался оттолкнуться от воздуха, но не вышло.\n";
  }
}
?>
