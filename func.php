<?php
  // =====================
  // Сборник функций и пр. проверка
  // =====================

  // Название куки
  @DEFINE('cookname','game_cookie');
  @DEFINE('cookname','game_cookie2');
  @DEFINE('AP','\'');

  // Данные для доступа к БД
  @DEFINE('DB_HOST','localhost');
  @DEFINE('DB_USER','root');
  @DEFINE('DB_PASS','');
  @DEFINE('DB_NAME'    ,'phpmmorpg');

  // Начальные значения, при регистрации пользователя
  @DEFINE('start_Sila',5);
  @DEFINE('start_Lovkost',5);
  @DEFINE('start_Mishlenie',5);
  @DEFINE('start_Intelekt',5);
  @DEFINE('start_Ydacha',5);

  $db_link = 0;

  function redirect($url)
  {
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL='.$url.'">';
    die;
  }

  // Процедура, выводит сообщение об ошибке и корректно перенаправляет
  // пользователя на главную страницу

  function goto_error($err_text)
  {
    echo '<b>Режим отладки: </b><br>'.$err_text.'<br><INPUT TYPE="button" VALUE="Назад" onClick="history.back()">';
    die;
  }

  // Открывает соединение с базой данных, правильно обрабатывает ситуацию,
  // когда соединение было открыто несколько раз
  function db_open()
  { // Открываем соединение с базой данных
    global $db_link;
    if($db_link==0) // Проверка, было-ли соединение уже открыто... можно убрать
    {
      $db_link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or goto_error(mysql_error());
      mysql_select_db(DB_NAME) or goto_error(mysql_error());
    }
  }

  // Посылает запрос к базе данных
  function db_query($str)
  { // Выполняем запрос базе данных
    global $db_result;
    $db_result = mysql_query($str) or goto_error(mysql_error());
  }

  // Обрабатывает результат запроса
  function db_fetch()
  { // Делим строку...
    global $db_result;
    $str = mysql_fetch_array($db_result, MYSQL_ASSOC);
    return $str;
  }

  // Дублирование функции для вложенных запросов
  function db_query2($str){global $db_result2; $db_result2 = mysql_query($str) or goto_error(mysql_error());}
  function db_fetch2(){global $db_result2; $str = mysql_fetch_array($db_result2, MYSQL_ASSOC); return $str; }


  // Проверяем авторизован-ли пользователь в игре..
  // Если да, то возвращаем хэш пользователя
  function check_auth()
  { global $my;
    if(isset($_COOKIE[cookname]))
    {
      $my['userid'] = mysql_real_escape_string($_COOKIE[cookname]);
  
  }else{
      goto_error('Вы не авторизованы в игре!');
  } }

  // Функция рассчета времени генерации странички
  function getmicrotime()
  {
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
  }
function generate_password($number)

  {

    $arr = array('a','b','c','d','e','f',

                 'g','h','i','j','k','l',

                 'm','n','o','p','r','s',

                 't','u','v','x','y','z',

                 'A','B','C','D','E','F',

                 'G','H','I','J','K','L',

                 'M','N','O','P','R','S',

                 'T','U','V','X','Y','Z',

                 '1','2','3','4','5','6',

                 '7','8','9','0');

    // Генерируем пароль

    $pass = "";

    for($i = 0; $i < $number; $i++)

    {

      // Вычисляем случайный индекс массива

      $index = rand(0, count($arr) - 1);

      $pass .= $arr[$index];

    }

    return $pass;

  }
#===============================================================================

?>