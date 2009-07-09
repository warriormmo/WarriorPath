<?php
$mymodraneniya = 0;
if ($my['Smert'] != 1) {
  if ($damage < 2) {
    $log = $log . $my['name'] . " Не получает ранения \n";
  }
  if (($damage >= 2) & ($damage < 6)) {
    if ($my['Carapina'] < 5) {
      $my['Carapina']++;
      $log = $log . $my['name'] . " получает царапину \n";
    } else {
      if ($my['Legkoe'] < 4) {
        $my['Legkoe']++;
        $log = $log . $my['name'] . " Получает легкое ранение \n";
        $mymodraneniya = - 1;
      } else {
        if ($my['Srednee'] < 3) {
          $my['Srednee']++;
          $log = $log . $my['name'] . " получает среднее ранение \n";
          $mymodraneniya = - 2;
        } else {
          if ($my['Tyageloe'] < 2) {
            $my['Tyageloe']++;
            $log = $log . $my['name'] . " получает тяжелое ранение \n";
            $mymodraneniya = - 3;
          } else {
            if ($my['Smertelnoe'] < 1) {
              $my['Smertelnoe']++;
              $log = $log . $my['name'] . " получает смертельное ранение \n";
              $mymodraneniya = - 4;
            } else {
              if ($my['Smert'] == 0) {
                $my['Smert'] = 1;
                $log = $log . $my['name'] . " УМЕР \n";
              } else {
                $log = $log . $enemy['name'] . " Жестоко пинает безжизненное тело \n";
              }
            }
          }
        }
      }
    }
  }
  if (($damage >= 6) & ($damage < 12)) {
    if ($my['Legkoe'] < 4) {
      $my['Legkoe']++;
      $log = $log . $my['name'] . " получает легкое ранение \n";
      $mymodraneniya = - 1;
    } else {
      if ($my['Srednee'] < 3) {
        $my['Srednee']++;
        $log = $log . $my['name'] . " получает среднее ранение \n";
        $mymodraneniya = - 2;
      } else {
        if ($my['Tyageloe'] < 2) {
          $my['Tyageloe']++;
          $log = $log . $my['name'] . " получает тяжелое ранение \n";
          $mymodraneniya = - 3;
        } else {
          if ($my['Smertelnoe'] < 1) {
            $my['Smertelnoe']++;
            $log = $log . $my['name'] . " получает смертельное ранение \n";
            $mymodraneniya = - 4;
          } else {
            if ($my['Smert'] == 0) {
              $my['Smert'] = 1;
              $log = $log . $my['name'] . " УМЕР \n";
            } else {
              $log = $log . $enemy['name'] . " Жестоко пинает безжизненное тело \n";
            }
          }
        }
      }
    }
  }
  if (($damage >= 12) & ($damage < 18)) {
    if ($my['Srednee'] < 3) {
      $my['Srednee']++;
      $log = $log . $my['name'] . " получает среднее ранение \n";
      $mymodraneniya = - 2;
    } else {
      if ($my['Tyageloe'] < 2) {
        $my['Tyageloe']++;
        $log = $log . $my['name'] . " получает тяжелое ранение \n";
        $mymodraneniya = - 3;
      } else {
        if ($my['Smertelnoe'] < 1) {
          $my['Smertelnoe']++;
          $log = $log . $my['name'] . " получает смертельное ранение \n";
          $mymodraneniya = - 4;
        } else {
          if ($my['Smert'] == 0) {
            $my['Smert'] = 1;
            $log = $log . $my['name'] . " УМЕР \n";
          } else {
            $log = $log . $enemy['name'] . " Жестоко пинает безжизненное тело \n";
          }
        }
      }
    }
  }
  if (($damage >= 18) & ($damage < 30)) {
    if ($my['Tyageloe'] < 2) {
      $my['Tyageloe']++;
      $log = $log . $my['name'] . " получает тяжелое ранение \n";
      $mymodraneniya = - 3;
    } else {
      if ($my['Smertelnoe'] < 1) {
        $my['Smertelnoe']++;
        $log = $log . $my['name'] . " получает смертельное ранение \n";
        $mymodraneniya = - 4;
      } else {
        if ($my['Smert'] == 0) {
          $my['Smert'] = 1;
          $log = $log . $my['name'] . " УМЕР \n";
        } else {
          $log = $log . $enemy['name'] . " Жестоко пинает безжизненное тело \n";
        }
      }
    }
  }
  if (($damage >= 30) & ($damage < 50)) {
    if ($my['Smertelnoe'] < 1) {
      $my['Smertelnoe']++;
      $log = $log . $my['name'] . " получает смертельное ранение \n";
      $mymodraneniya = - 4;
    } else {
      if ($my['Smert'] == 0) {
        $my['Smert'] = 1;
        $log = $log . $my['name'] . " УМЕР \n";
      } else {
        $log = $log . $enemy['name'] . " Жестоко пинает безжизненное тело \n";
      }
    }
  }
  if ($damage >= 50) {
    if ($my['Smert'] == 0) {
      $my['Smert'] = 1;
      $log = $log . $my['name'] . " УМЕР \n";
    } else {
      $log = $log . $enemy['name'] . " Жестоко пинает безжизненное тело \n";
    }
  }
} else {
  $log = $log . $enemy['name'] . " Жестоко пинает безжизненное тело \n";
}
if (($mymodraneniya+$mymods['beschuvstvie'])<=0){$mymodraneniya=$mymodraneniya+$mymods['beschuvstvie'];}
?>