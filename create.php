<?php
error_reporting(1);
header("Expires: Mon, 1 Jul 1990 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$nocashe = rand(0, 100000);
DEFINE('TIME_USER', 60); // ����� ���������� ������������ (���.)
DEFINE('TIME_BATTLE', 60); // ����� ����� ����������� �������� (���.)
// ���������� ������ � ���������
require_once ('func.php');
db_open();
check_auth(); // ��������� ���������-�� ������������
db_query('SELECT * FROM game_user WHERE userid=' . AP . $my['userid'] . AP . ' LIMIT 1;');
$my = db_fetch();
if (empty($my)) {
  redirect('index.html');
}
if ($my['reg'] <>0)
{redirect('index.html');}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=koi8-r" />
<title>���� �����</title>
<script language="javascript">AC_FL_RunContent = 0;</script>
<script src="AC_RunActiveContent.js" language="javascript"></script>
</head> 
<body background="files/BG.jpg" CELLSPACING=0 CELLPADDING=0  leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table WIDTH=100% HEIGHT=100% BORDER=0 CELLSPACING=0 CELLPADDING=0> 
<TR>
<TD WIDTH=50% HEIGHT=100% background="files/bgup.jpg">
<TABLE WIDTH="100%" HEIGHT="768" BORDER=0 CELLSPACING=0 CELLPADDING=0 background="files/BGup.jpg">
<TR>
<TD ALIGN="left"></TD>
</TR>
</TABLE>
</TD>
<TD WIDTH="1024" HEIGHT=100% BGCOLOR=#d6b866>
<script language="javascript">
	if (AC_FL_RunContent == 0) {
		alert("This page requires AC_RunActiveContent.js.");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
			'width', '1024',
			'height', '768',
			'src', 'site',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', 'window',
			'devicefont', 'false',
			'id', 'site',
			'bgcolor', '#ffffff',
			'name', 'site',
			'menu', 'true',
			'allowFullScreen', 'false',
			'allowScriptAccess','sameDomain',
			'movie', 'create',
			'salign', ''
			); //end AC code
	}
</script>
<noscript>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="1024" height="728" id="site" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="movie" value="site.swf" /><param name="quality" value="high" /><param name="scale" value="noscale" /><param name="bgcolor" value="#ffffff" />	<embed src="create.swf" quality="high" scale="showall" bgcolor="#ffffff" width="1024" height="768" name="create" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>
</noscript>
</TD>
<TD WIDTH=50% HEIGHT=100% background="files/bgup.jpg">
<TABLE WIDTH="100%" HEIGHT="768" BORDER=0 CELLSPACING=0 CELLPADDING=0 background="files/BGup.jpg">
<TR>
<TD ALIGN="right"></TD>
</TR>
</TABLE>
</TD>
</TR>



<TR>
<TD WIDTH=50%></TD>
<TD><img src="files/spacer.gif" WIDTH=1000></TD>
<TD WIDTH=50%></TD>
</TR>



</table>
</body> 
</html>