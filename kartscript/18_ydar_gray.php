<?
if ($battle['dist']==2)
{
$log =$log."Слишком далеко до противника. ".$first." промахнулся.\n"; // Проверка на дистанцию
}
else
{

$log =$log.$first." оттолкнул ".$second." \n";
if ($battle['dist']==1)
    {
      db_query('UPDATE game_battle SET `dist`=2 WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
     $battle['dist']=2;
    }
   if ($battle['dist']==0)
    {
      db_query('UPDATE game_battle SET `dist`=1 WHERE (user1='.$my['id'].' OR user2='.$my['id'].')AND(`end`!=1) LIMIT 1;');
      $battle['dist']=1;
    }
$my['moddeystvie']--;
$log =$log.$second." теряет равновесие. \n";
}
$enemy['moddeystvie']--;//минусование мода действия
//удаление всех модификаторов кроме стоек и техник
?>