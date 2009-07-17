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
<!-- saved from url=(0013)about:internet -->
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=koi8-r" />
<title>game</title>
<script language="javascript"> AC_FL_RunContent = 0; </script>
<script language="javascript"> DetectFlashVer = 0; </script>
<script src="AC_RunActiveContent.js" language="javascript"></script>
<script language="JavaScript" type="text/javascript">
<!--
// -----------------------------------------------------------------------------
// Globals
// Major version of Flash required
var requiredMajorVersion = 9;
// Minor version of Flash required
var requiredMinorVersion = 0;
// Revision of Flash required
var requiredRevision = 45;
// -----------------------------------------------------------------------------
// -->
</script>
</head>
<body bgcolor="#ffffff">
<!--url's used in the movie-->
<!--text used in the movie-->
<script language="JavaScript" type="text/javascript">
<!--
if (AC_FL_RunContent == 0 || DetectFlashVer == 0) {
	alert("This page requires AC_RunActiveContent.js.");
} else {
	var hasRightVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);
	if(hasRightVersion) {  // if we've detected an acceptable version
		// embed the flash movie
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,45,0',
			'width', '1024',
			'height', '768',
			'src', 'game',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', 'window',
			'devicefont', 'false',
			'id', 'game',
			'bgcolor', '#ffffff',
			'name', 'game',
			'menu', 'true',
			'allowScriptAccess','sameDomain',
			'allowFullScreen','false',
			'movie', 'game',
			'salign', ''
			); //end AC code
	} else {  // flash is too old or we can't detect the plugin
		var alternateContent = 'Alternate HTML content should be placed here.'
			+ 'This content requires the Adobe Flash Player.'
			+ '<a href=http://www.macromedia.com/go/getflash/>Get Flash</a>';
		document.write(alternateContent);  // insert non-flash content
	}
}
// -->
</script>
<noscript>
	// Provide alternate content for browsers that do not support scripting
	// or for those that have scripting disabled.
  	Alternate HTML content should be placed here. This content requires the Adobe Flash Player.
  	<a href="http://www.macromedia.com/go/getflash/">Get Flash</a>
</noscript>
</body>
</html>
