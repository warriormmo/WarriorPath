<?php
include ("mods.php");
//разбор кому пренадлежит сгранная карта
if ($first == $my['name']) {
 $id = $enemy['id'];
  //что имеено происходит при отгреше карты
$log = $log . $first . " Кричит изо всей силы.\n"; 

 if ($enemymods['besstrashie']==0)
  {
    $log = $log . $second . " в шоке.\n";
    db_query('INSERT INTO `modificators`(id,time,nadamage,nayklonenie,nablok,strah)  VALUES (' . $id . ',1000,-1,-1,-1,1)'); //занесение в моды
  $enemymods['strah']=1;
  $my['resultat']=$my['resultat']."3;";
  }else
  {
    $log = $log ."А ". $second . " наплевать на это.\n";
    $my['resultat']=$my['resultat']."4;";
  }
 
} else {
  $id = $my['id'];
 $log = $log . $first . " Кричит изо всей силы.\n"; 

 if ($mymods['besstrashie']==0)
  {
    $log = $log . $second . " в шоке.\n";
    db_query('INSERT INTO `modificators`(id,time,nadamage,nayklonenie,nablok,strah)  VALUES (' . $id . ',1000,-1,-1,-1,1)'); //занесение в моды
  $mymods['strah']=1;
  $enemy['resultat']=$enemy['resultat']."3;";
  }else
  {
    $log = $log ."А ". $second . " наплевать на это.\n";
    $enemy['resultat']=$enemy['resultat']."4;";
  }

}

?>
