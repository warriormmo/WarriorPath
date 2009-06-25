<?php

$log =$log.$first." ринулся в бой со всех сил.\n";

if ($first==$my['name'])
{$id=$my['id'];
$schoolred=$my['schoolred'];}
else
{$id=$enemy['id'];
$schoolred=$enemy['schoolred'];}
//что имеено происходит при отгреше карты
if ($schoolred>0)//карта требует красную школу
{
}else{$log =$log.$first." пытался что-то изобразить.\n";}
?>
