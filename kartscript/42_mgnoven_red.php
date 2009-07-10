<?php
$log = $log . $first . " вошел в боевой раж.\n";
//разбор кому пренадлежит сгранная карта
if ($first == $my['name']) {
  $id = $my['id'];
  $my['moddeystvie']++;
 $my['resultat']=$my['resultat']."3;";

} else {
  $id = $enemy['id'];
  $enemy['moddeystvie']++;
  $enemy['resultat']=$enemy['resultat']."3;";
}
//что имеено происходит при отгреше карты

?>
