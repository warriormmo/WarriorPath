<?php
  // =====================
  // ������� ������� � ��.
  // =====================

  // �������� ����
  @define('cookname', 'game_cookie');
  @define('cookname', 'game_cookie2');
  @define('AP', '\'');

  // ������ ��� ������� � ��
  @define('DB_HOST', 'localhost');
  @define('DB_USER', 'root');
  @define('DB_PASS', 'root');
  @define('DB_NAME', 'phpmmorpg');

  // ��������� ��������, ��� ����������� ������������
  @define('start_Sila', 5);
  @define('start_Lovkost', 5);
  @define('start_Mishlenie', 5);
  @define('start_Intelekt', 5);
  @define('start_Ydacha', 5);

  $db_link = 0;

  function redirect($url)
  {
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=' . $url . '">';
    die;
  }

  // ���������, ������� ��������� �� ������ � ��������� ��������������
  // ������������ �� ������� ��������

  function goto_error($err_text)
  {
    echo '<b>����� �������: </b><br>' . $err_text . '<br><INPUT TYPE="button" VALUE="�����" onClick="history.back()">';
    die;
  }

  // ��������� ���������� � ����� ������, ��������� ������������ ��������,
  // ����� ���������� ���� ������� ��������� ���
  function db_open()
  {
    // ��������� ���������� � ����� ������
    global $db_link;
    if ($db_link == 0) {
      // ��������, ����-�� ���������� ��� �������... ����� ������
      $db_link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or goto_error(mysql_error());
      mysql_select_db(DB_NAME) or goto_error(mysql_error());
    }
  }

  // �������� ������ � ���� ������
  function db_query($str)
  {
    // ��������� ������ ���� ������
    global $db_result;
    $db_result = mysql_query($str) or goto_error(mysql_error());
  }

  // ������������ ��������� �������
  function db_fetch()
  {
    // ����� ������...
    global $db_result;
    $str = mysql_fetch_array($db_result, MYSQL_ASSOC);
    return $str;
  }

  // ������������ ������� ��� ��������� ��������
  function db_query2($str)
  {
    global $db_result2;
    $db_result2 = mysql_query($str) or goto_error(mysql_error());
  }
  function db_fetch2()
  {
    global $db_result2;
    $str = mysql_fetch_array($db_result2, MYSQL_ASSOC);
    return $str;
  }

  // ��������� �����������-�� ������������ � ����..
  // ���� ��, �� ���������� ��� ������������
  function check_auth()
  {
    global $my;
    if (isset($_COOKIE[cookname])) {
      $my['userid'] = mysql_real_escape_string($_COOKIE[cookname]);
    } else {

      goto_error('�� �� ������������ � ����!');
    }
  }

  // ������� �������� ������� ��������� ���������
  function getmicrotime()
  {
    list($usec, $sec) = explode(" ", microtime());
    return((float)$usec + (float)$sec);
  }
  function generate_password($number)
  {
    $arr = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'v', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'V', 'X', 'Y', 'Z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0');

    // ���������� ������

    $pass = "";

    for ($i = 0; $i < $number; $i++) {
      // ��������� ��������� ������ �������

      $index = rand(0, count($arr) - 1);

      $pass .= $arr[$index];
    }

    return $pass;
  }
  //===============================================================================
?>