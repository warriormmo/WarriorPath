<?php
error_reporting(1);
header("Expires: Mon, 1 Jul 1990 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$nocashe = rand(0, 100000);
DEFINE('TIME_USER', 60); // бПЕЛЪ ЮЙРХБМНЯРХ ОНКЭГНБЮРЕКЪ (ЯЕЙ.)
DEFINE('TIME_BATTLE', 60); // бПЕЛЪ ФХГМХ МЕОПХМЪРНЦН ЯПЮФЕМХЪ (ЯЕЙ.)
// оНДЦПСФЮЕЛ ЛНДСКЭ Я ТСМЙЖХЪЛХ
require_once ('func.php');
db_open();
check_auth(); // оПНБЕПЪЕЛ ЮБРНПХГЮМ-КХ ОНКЭГНБЮРЕКЭ
db_query('SELECT * FROM game_user WHERE userid=' . AP . $my['userid'] . AP . ' LIMIT 1;');
$my = db_fetch();
if (empty($my)) {
  redirect('index.html');
}
if ($my['reg'] ==0)
{redirect('create.php');}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=koi8-r" />
<title>оСРЭ бНХМЮ</title>
<script language="javascript">AC_FL_RunContent = 0;</script>
<script src="AC_RunActiveContent.js" language="javascript"></script>
</head> 
<body background="files/BG.jpg" CELLSPACING=0 CELLPADDING=0  leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table WIDTH=100% HEIGHT=100% BORDER=0 CELLSPACING=0 CELLPADDING=0> 
<TR>
<TD WIDTH=50% HEIGHT=100% background="files/bgup.jpg">
<TABLE WIDTH="100%" HEIGHT="560" BORDER=0 CELLSPACING=0 CELLPADDING=0 background="files/BGup.jpg">
<TR>
<TD ALIGN="left"></TD>
</TR>
</TABLE>
</TD>
<TD WIDTH="1024" HEIGHT="100%" BGCOLOR=#d6b866>

<script language="javascript">
	if (AC_FL_RunContent == 0) {
		alert("This page requires AC_RunActiveContent.js.");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
			'width', '1024',
			'height', '560',
			'src', 'site',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'noscale',
			'wmode', 'window',
			'devicefont', 'false',
			'id', 'site',
			'bgcolor', '#ffffff',
			'name', 'site',
			'menu', 'true',
			'allowFullScreen', 'false',
			'allowScriptAccess','sameDomain',
			'movie', 'home',
			'salign', ''
			); //end AC code
	}
</script>
<noscript>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="1024" height="728" id="site" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="movie" value="home.swf" /><param name="quality" value="high" /><param name="scale" value="noscale" /><param name="bgcolor" value="#ffffff" />	<embed src="home.swf" quality="high" scale="noscale" bgcolor="#ffffff" width="1024" height="560" name="home" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>
</noscript>

</TD>
<TD WIDTH=50% HEIGHT=100% background="files/bgup.jpg">
<TABLE WIDTH="100%" HEIGHT="560" BORDER=0 CELLSPACING=0 CELLPADDING=0 background="files/BGup.jpg">
<TR>
<TD ALIGN="right"></TD>
</TR>
</TABLE>
</TD>
</TR>

<tr width=1024>
<TD WIDTH=50%></TD>
<td>
<table border="0" width="1024" cellspacing="0" cellpadding="0">
	<tr>
		<td height="8"><img src=files/4at/up.jpg></td>
	</tr>
		<tr>
		<td>
		
		<table border="0" width="100%" height="157" cellspacing="0" cellpadding="0">
	<tr>
		<td width="30"><img src=files/4at/l.jpg></td>
		<td bgcolor=886c44>
<table border="0" height="157" width=964 cellspacing="0" cellpadding="0">
	<tr>
		<td><table border="0" width="964" cellspacing="0" cellpadding="0" height=140>
	<tr>
		<td width=177>
		<table border="0" width="177" height=140 cellspacing="0" cellpadding="0">
	<tr>
		<td height=24 background=files/4at/1.jpg colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td height=8 background=files/4at/2.jpg colspan=2></td>
	</tr>
		<tr>
		<td width=162 bgcolor=886c44></td>
		<td width=15 background=files/4at/3.jpg></td>
	</tr>
</table>



		</td>
		<td background=files/4at/upinr.jpg>&nbsp;</td>
	</tr>
</table></td>
	</tr>
	<tr>
		<td height=17><table border="0" width="964" height=17 cellspacing="0" cellpadding="0">
	<tr>
		<td width="177" background=files/4at/dwninl.jpg></td>
		<td width="697" background=files/4at/dwninc.jpg></td>
		<td width="90" background=files/4at/dwninr.jpg></td>
	</tr>
</table>
</td>
	</tr>
</table>
</td>
		<td width="30"><img src=files/4at/r.jpg></td>
	</tr>
</table>
		
		
		
		</td>
	</tr>
		<tr>
		<td height="28"><img src=files/4at/dwn.jpg></td>
	</tr>
</table>

</td>
<TD WIDTH=50%></TD>
</tr>

<TR>
<TD WIDTH=50%></TD>
<TD height=1><img src="files/spacer.gif" WIDTH=1024></TD>
<TD WIDTH=50%></TD>
</TR>



</table>
</body> 
</html>