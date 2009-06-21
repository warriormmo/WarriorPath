<?php
  require_once('include/DbSimple/Generic.php');

  global $dbs_list, $dbs_struct;
  if (is_array($dbs_list)){
    foreach($dbs_list as $db => $desc){
      global $$db;
      $dsn = sprintf('mysql://%1$s:%2$s@%3$s/%4$s',
        @$desc['db_user'], @$desc['db_pass'], @$desc['db_host'], @$desc['db_name']);
      $$db = DbSimple_Generic::connect($dsn);
      if (!$$db){
        cmn_errorOut('[database.inc] DB ('.$db.') is not available.', FAIL_ON_DB_ERROR);
      }
      $$db->setErrorHandler('dbErrorHandler');
      $$db->setLogger('dbLogger');

      $dbs_struct[$$db->database_name] = db_getTableList($$db);
    }
  } else {
    cmn_errorOut('DB\'s list not found!!!', FAIL_ON_DB_ERROR);
  }


  function dbErrorHandler($message, $info)
  {
    $_text = "[dbErrorHandler] SQL Error: $message<br><pre>";
    foreach($info as $key => $text)
    {
      $_text .= $key.':: '.$text.'<br />';
    }//foreach
    $_text .= "</pre>";
    cmn_errorOut($_text, FAIL_ON_SQL_ERROR);
  }

  function dbLogger($db, $sql)
  {
    $file_name = 'sql.log';
    if (!file_exists($file_name))
    { $fopenattr = 'w+'; }
    else
    { $fopenattr = 'a'; }

    $file = fopen($file_name, $fopenattr);

    $caller = $db->findLibraryCaller();
    $tip = "at ".@$caller['file'].' line '.@$caller['line'];

    if (!strstr($sql, 'returned')){
      fwrite($file, "---------------\n".date('D d-M-Y H:i:s')."\n");
      fwrite($file, $tip."\n");
    }
    fwrite($file, $sql."\n");
  }


?>