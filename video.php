<head>
<?php
$n=$_GET["n"];

$swfurl="live_video.swf?n=".urlencode($n);
$scale="noborder";
 
$agent = $_SERVER['HTTP_USER_AGENT'];
if( strstr($agent,'iPhone') || strstr($agent,'iPod') || strstr($agent,'iPad')) 
echo "<p><b>iOS detected: If your browser does not support Flash plugin, a transcoded stream could be available (if supported by host): <a href='ls_transcoder.php?n=$n'>iOS Transcoder</a></b></p>";
	

?><style type="text/css">
<!--
body {
	background-color: #000;
}
-->
</style>
<title><?=$n?> Live Video Streaming</title>
</head>
<body  leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"> 

<div id="videowhisper_video">
<object width="100%" height="100%">
<param name="movie" value="<?=$swfurl?>"></param><param name="scale" value="<?=$scale?>" /><param name="salign" value="lt"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed width="100%" height="100%" scale="<?=$scale?>" salign="lt" src="<?=$swfurl?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true"></embed>
</object>
</div>

</body>