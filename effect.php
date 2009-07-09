<?
if ($enemymods['dop_mod_ran2']>0)
      {
        $mymodraneniya = $mymodraneniya * 2; //свойство удара ранение х2
      }
if ($enemymods['dop_mod_ottolknut']>0)
      {     
      $log = $log . $first . " оттолкнул " . $second . " \n";
      if ($battle['dist'] == 1) {
        db_query('UPDATE game_battle SET `dist`=2 WHERE (user1=' . $my['id'] . ' OR user2=' . $my['id'] . ')AND(`end`!=1) LIMIT 1;');
        $battle['dist'] = 2;
      }
      if ($battle['dist'] == 0) {
        db_query('UPDATE game_battle SET `dist`=1 WHERE (user1=' . $my['id'] . ' OR user2=' . $my['id'] . ')AND(`end`!=1) LIMIT 1;');
        $battle['dist'] = 1;
      }
      }
if ($enemymods['dop_mod_ravnovesie']>0)
      {
      $my['moddeystvie']--;
      $log = $log . $second . " теряет равновесие. -1 действие \n";
      }
if ($enemymods['dop_mod_kontuziya']>0)
      {     
      //Контузия
      $j=0;
      for ($i=0;$i<=count($hend);$i++)
        { 
          if ($hend[$i]<>"")
            {
              $hend[$i]="";
              $j++;
            }
          if ($j>=1)
            {
              $i=1000;
            }
        }
        $log = $log . $second . " контужен, похоже он что-то забыл. \n";
      //конец контузии
      }
if ($enemymods['dop_mod_padenie']>0)
      {
      $my['moddeystvie']--;
      $log = $log . $second . " упал. На поптку встать -2 действия. \n";
      }
      

?>