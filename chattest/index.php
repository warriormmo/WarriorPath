<?php
 if (isset($_POST['GET_NAME'])){
     $randval = rand(2,1000);

     echo $randval;
   }else {
 print '<html>
<body>

	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="1003" height="597" id="derevna" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="movie" value="derevna.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" />	<embed src="derevna.swf" quality="high" bgcolor="#ffffff" width="1003" height="597" name="derevna" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_ru" />
	</object>

</body>
</html>';
}
?>