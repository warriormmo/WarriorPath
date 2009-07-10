<?php
include ("mods.php");
//разбор кому пренадлежит сгранная карта
if ($first == $my['name']) {
  $id = $my['id'];
 if ($mymods['razvorot']==0)
  {
    //что имеено происходит при отгреше карты
    $log = $log . $first . " развернулся.\n";
    $my['resultat']=$my['resultat']."3;";
    db_query('INSERT INTO `modificators`(id,time,napovdaludaru,razvorot)  VALUES (' . $id . ',1000,2,1)'); //занесение в моды
    
  }else
  {
    $log = $log . $first . " Попытался сделать двойной разворот, но не вышло.\n";
    $my['resultat']=$my['resultat']."4;";
  }

} else {
  $id = $enemy['id'];
   if ($enemymods['razvorot']==0)
  {
    //что имеено происходит при отгреше карты
    $log = $log . $first . " развернулся.\n";
    $enemy['resultat']=$enemy['resultat']."3;";
    db_query('INSERT INTO `modificators`(id,time,napovdaludaru,razvorot)  VALUES (' . $id . ',1000,2,1)'); //занесение в моды
    
  }else
  {
    $log = $log . $first . " Попытался сделать двойной разворот, но не вышло.\n";
    $enemy['resultat']=$enemy['resultat']."4;";
  }
}
?>
