<?
$hit=0;
$damage=0;//инициализация переменных
$blok=0;
include ("mods.php"); //выборка модов для my и enemy выходне переменне $mymods[''] $enemymods[''];
  
$hitcount=$enemy['Lovkost']+$enemy['schoolred']+$enemy['moddeystvie']+$enemy['modranenie']+$enemymods['napopodanie'];//кол кубиков на попадание с учетом всех модов -3 от карты
if ($hitcount>0){for ($i=1; $i<=$hitcount; $i++){$hit=$hit+rand(1,6);}}else{$hit=0;}//бросок кубиков
$log =$log.$first." пытается ударить \n<i>Коленом в торс</i> \n";
$log =$log."На выполнение - ".$hit." \n";
if ($hit<3){$log =$log.$first." не в состоянии выполнить удар ".$second.". \n";}//условие вполнения удара
else { // описание последствий удара
$log =$log.$first." бьет в торс ".$second.". \n";
$blokcount=$my['Sila']+$my['Boks']+$my['moddeystvie']+$my['modranenie']+$mymods['nablok'];//кол кубиков на блок
for ($i=1; $i<=$blokcount; $i++){$blok=$blok+rand(1,6);}//бросок кубиков
$log =$log."Кубиков на попадание - ".$hitcount." на блок - ".$blokcount." \n";
$log =$log."Результат на попадание - ".$hit." на блок - ".$blok." \n";
if ($hit>$blok)//если на поподание больше блока
{
$damagecount=$enemy['Sila']+$enemy['nadamage']-round(($my['Sila']/2))+$mymods['naarmor']+$enemy['modranenie']+1;//расчет кол кубиков на повреждение
if ($damagecount>0){for ($i=1; $i<=$damagecount; $i++){$damage=$damage+rand(1,6);}}else{$damage=0;}//бросок кубиков
$log =$log.$first." попал \n"."Сила удара ".$damagecount." кубиков, результат ".$damage."\n";
include ("myhealth.php");//расчет ранений в зависимости от дамага
//$log =$log.$mymodraneniya;
//$mymodraneniya=$mymodraneniya*2;//свойство удара ранение х2
$my['moddeystvie']--;
$log =$log.$second." потерял равновесие \n";
if ($mymodraneniya<$my['modranenie']){$my['modranenie']=$mymodraneniya;$log =$log."Модификатор от раны:".$mymodraneniya."\n";}//запись ранения
}else{$log =$log.$second." отбил удар \n";}

}  
$enemy['moddeystvie']--;//минусование мода действия
//удаление всех модификаторов кроме стоек и техник
include("delmods.php");//ВЫТЕРАЕМ моды нафиг 
?>