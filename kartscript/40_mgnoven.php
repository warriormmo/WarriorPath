<?php

$log =$log.$first." Встал в стойку Глухая защита.\n";

if ($first==$my['name'])
{$id=$my['id'];
$schoolred=$my['schoolred'];}
else
{$id=$enemy['id'];
$schoolred=$enemy['schoolred'];}
//что имеено происходит при отгреше карты
if ($schoolred>0)//карта требует красную школу
{
db_query('DELETE FROM `modificators` WHERE (`id`='.$id.') and (`stoyka`=1)');//вытераем предыдущую стойку
db_query('UPDATE `game_user` SET `stoyka` = "40_mgnoven" WHERE id = '.$id.' LIMIT 1;');  //занесение в базу в стойку
db_query('INSERT INTO `modificators`(id,time,nadamage,napopodanie,nayklonenie,nablok,stoyka)  VALUES ('.$id.',1000,-2,-3,3,3,1)');//занесение в моды
}else{$log =$log.$first." пытался что-то изобразить.\n";}
?>
