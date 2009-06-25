<?php
$log = $log . $first . " вошел в боевой раж.\n";
//разбор кому пренадлежит сгранная карта
if ($first == $my['name']) {
  $id = $my['id'];
  $my['moddeystvie']++;
} else {
  $id = $enemy['id'];
  $enemy['moddeystvie']++;
}
//что имеено происходит при отгреше карты

?>
