<?php
if ($battle['dist'] == 2) {
  $log = $log . "Слишком далеко до противника. " . $first . " промахнулся, и теряет равновесие.\n"; // Проверка на дистанцию
  $enemy['moddeystvie']--;
  $enemy['resultat']=$enemy['resultat']."2;";
} else {
  $dopmoddist = 0;
  if ($battle['dist'] == 0) // слишком близко
  {
    $log = $log . "Слишком близко к противнику. " . $first . " получает дополнительнй модификатор -2 на поподание.\n";
    $dopmoddist = - 2;
  }
  $hit = 0;
  $damage = 0; //инициализация переменных
  $blok = 0;
  include ("mods.php"); //выборка модов для my и enemy выходне переменне $mymods[''] $enemymods[''];
  $maxschool = 0;
  if ($enemy['Boks'] > $maxschool) {
    $maxschool = $enemy['Boks'];
  }
  if ($enemy['schoolred'] > $maxschool) {
    $maxschool = $enemy['schoolred'];
  }
  if ($enemy['schoolgreen'] > $maxschool) {
    $maxschool = $enemy['schoolgreen'];
  }
  if ($enemy['schoolblue'] > $maxschool) {
    $maxschool = $enemy['schoolblue'];
  } //акая школа больше той и бъет
  if ($enemy['schoolwhite'] > $maxschool) {
    $maxschool = $enemy['schoolwhite'];
  }
  if ($enemy['schoolblack'] > $maxschool) {
    $maxschool = $enemy['schoolblack'];
  }
  $hitcount = $enemy['Lovkost'] + $maxschool + $enemy['moddeystvie'] + $enemy['modranenie'] + $enemymods['napopodanie'] + $dopmoddist + $enemymods['napopdaludaru'] + $enemymods['napopdaludarnogoy'] + $enemymods['napopvtors']+$enemymods['nadeystvie'] - 2; //кол кубиков на попадание с учетом всех модов -3 от карты
  if ($hitcount > 0) {
    for ($i = 1; $i <= $hitcount; $i++) {
      $hit = $hit + rand(1, 6);
    }
  } else {
    $hit = 0;
  } //бросок кубиков
  $log = $log . $first . " пытается выполнить  \n<i>Прямой удар</i> \n";
  $log = $log . "На выполнение - " . $hit . " \n";
  if ($hit < 3) {
    $log = $log . $first . " не в состоянии выполнить удар " . $second . ". \n";
    $enemy['resultat']=$enemy['resultat']."2;";
  } //условие вполнения удара
  else { // описание последствий удара
    $log = $log . $first . " бьет в грудь " . $second . ". \n";
    $blokcount = $my['Sila'] + $my['Boks'] + $my['moddeystvie']+$mymods['nadeystvie'] + $my['modranenie'] + $mymods['nablok']; //кол кубиков на блок
    for ($i = 1; $i <= $blokcount; $i++) {
      $blok = $blok + rand(1, 6);
    } //бросок кубиков
    $log = $log . "Кубиков на попадание - " . $hitcount . " на блок - " . $blokcount . " \n";
    $log = $log . "Результат На попадание - " . $hit . " на блок - " . $blok . " \n";
    if ($hit > $blok) //если на поподание больше блока
    {
      $damagecount = $enemy['Sila'] + $enemymods['nadamage'] - round(($my['Sila'] / 2)) + $mymods['naarmor'] + $enemy['modranenie'] + $enemymods['napovvtors'] + $enemymods['napovdaludaru'] + $enemymods['napovdaludarnogoy'] + 1; //расчет кол кубиков на повреждение
      if ($damagecount > 0) {
        for ($i = 1; $i <= $damagecount; $i++) {
          $damage = $damage + rand(1, 6);
        }
      } else {
        $damage = 0;
      } //бросок кубиков
      $log = $log . $first . " попал \n" . "Сила удара " . $damagecount . " кубиков, результат " . $damage . "\n";
      include ("myhealth.php"); //расчет ранений в зависимости от дамага
      $log = $log . $first . " оттолкнул " . $second . " \n";
      if ($battle['dist'] == 1) {
        db_query('UPDATE game_battle SET `dist`=2 WHERE (user1=' . $my['id'] . ' OR user2=' . $my['id'] . ')AND(`end`!=1) LIMIT 1;');
        $battle['dist'] = 2;
      }
      if ($battle['dist'] == 0) {
        db_query('UPDATE game_battle SET `dist`=1 WHERE (user1=' . $my['id'] . ' OR user2=' . $my['id'] . ')AND(`end`!=1) LIMIT 1;');
        $battle['dist'] = 1;
      }
      $my['moddeystvie']--;
      $log = $log . $second . " теряет равновесие. \n";
      if ($mymodraneniya < $my['modranenie']) {
        $my['modranenie'] = $mymodraneniya;
        $log = $log . "Модификатор от раны:" . $mymodraneniya . "\n";
      } //запись ранения
      $enemy['resultat']=$enemy['resultat']."1;";
    } else {
      $log = $log . $second . " отбил удар, а " . $first . " теряет равновесие \n";
      $enemy['moddeystvie']--;
      $enemy['resultat']=$enemy['resultat']."2;";
    }
  }
}
$enemy['moddeystvie']--; //минусование мода действия
//удаление всех модификаторов кроме стоек и техник
include ("delmods.php"); //ВЫТЕРАЕМ моды нафиг

?>