<?php


//разбор кому пренадлежит сгранная карта
if ($first==$my['name'])
{$id=$my['id'];}
else
{$id=$enemy['id'];}
//что имеено происходит при отгреше карты
$log =$log.$first." подпрыгнул.\n";
db_query('INSERT INTO `modificators`(id,time,nadamage,napopodanie,nayklonenie)  VALUES ('.$id.',1000,1,1,2)');//занесение в моды
?>
