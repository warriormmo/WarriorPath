<?php
  //project relative defines
  define('PROJECT_TITLE', 'WarriorPath');

  //debug levels
  define('FAIL_ON_DB_ERROR',      0x01);
  define('FAIL_ON_SQL_ERROR',     0x02);

  define('DEBUG_LEVEL', FAIL_ON_DB_ERROR | FAIL_ON_SQL_ERROR);

  //db defines
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', 'root');
  define('DB_NAME', 'phpmmorpg');

  global $dbs_listb;
  $dbs_listb = array(
    'db_main' => array(
      'db_host' => DB_HOST,
      'db_user' => DB_USER,
      'db_pass' => DB_PASS,
      'db_name' => DB_NAME,
    ),
  );

  //cookie defines
  define('cookie_prefix', 'wp_');
  define('cookie_userid', cookie_prefix.'userid');
?>