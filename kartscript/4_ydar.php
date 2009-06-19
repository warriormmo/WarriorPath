<?php
  $hit = 0;
  //инициализация переменных
  $damage = 0;
  $blok = 0;
  //выборка модов для my и enemy выходне переменне $mymods[''] $enemymods[''];
  include("mods.php");

  //кол кубиков на попадание с учетом всех модов -3 от карты
  $hitcount = $enemy['Lovkost'] + $enemy['schoolred'] + $enemy['moddeytvie'] + $enemy['modranenie'] + $enemymods['napopodanie'] - 2;
  if ($hitcount > 0) {
    for ($i = 1; $i <= $hitcount; $i++) {
      $hit = $hit + rand(1, 6);
    }
  } else {
    $hit = 0;
  }
  //бросок кубиков
  $log = $log . $first . " пытается ударить \n<i>Логтем в плечо</i> \n";
  $log = $log . "На выполнение - " . $hit . " \n";
  if ($hit < 3) {
    $log = $log . $first . " не в состоянии выполнить удар " . $second . ". \n";
  }
  //условие вполнения удара
  else {
    // описание последствий удара
    $log = $log . $first . " бьет в плечо " . $second . ". \n";
    //кол кубиков на блок
    $blokcount = $my['Sila'] + $my['Boks'] + $my['moddeytvie'] + $my['modranenie'] + $mymods['nablok'];
    for ($i = 1; $i <= $blokcount; $i++) {
      $blok = $blok + rand(1, 6);
    }
    //бросок кубиков
    $log = $log . "На попадание - " . $hit . " на блок - " . $blok . " \n";
    if ($hit > $blok) {
      //если на поподание больше блока
      //расчет кол кубиков на повреждение
      $damagecount = $enemy['Sila'] + $enemy['nadamage'] - round(($my['Sila'] / 2)) + $mymods['naarmor'] + $enemy['modranenie'];
      if ($damagecount > 0) {
        for ($i = 1; $i <= $damagecount; $i++) {
          $damage = $damage + rand(1, 6);
        }
      } else {
        $damage = 0;
      }
      //бросок кубиков
      $log = $log . $first . " попал \n" . "Сила удара -" . $damage . "\n";
      //расчет ранений в зависимости от дамага
      include("myhealth.php");
      //$log =$log.$mymodraneniya;
      //свойство удара ранение х2
      $mymodraneniya = $mymodraneniya * 2;
      if ($mymodraneniya < $my['modranenie']) {
        $my['modranenie'] = $mymodraneniya;
        $log = $log . "Модификатор от раны:" . $mymodraneniya . "\n";
      }
      //запись ранения
    } else {
      $log = $log . $second . " отбил удар \n";
    }
  }
  //минусование мода действия
  $enemy['moddeystvie']--;
  //удаление всех модификаторов кроме стоек и техник
  //ВЫТЕРАЕМ моды нафиг
  include("delmods.php");
?>