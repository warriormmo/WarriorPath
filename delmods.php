<?php
  //вытераем их нафиг
  db_query('DELETE FROM `modificators` WHERE ((`id`=' . $my['id'] . ') and (`stoyka`!=1) and (`technic`!=1));');
  //вытераем их нафиг
  db_query('DELETE FROM `modificators` WHERE ((`id`=' . $enemy['id'] . ') and (`stoyka`!=1) and (`technic`!=1));');
?>