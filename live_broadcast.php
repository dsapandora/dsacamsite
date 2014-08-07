<?php
if (!$_POST["username"]||$_POST["username"]=="Model") $username="Model".rand(100,999);
else $username=$_POST["username"];
include("incsan.php");
sanV($username);
if (!$username) exit;
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
	color: #EEE;
}

a
{
	color: #CC5577;
	font-weight: normal;
	text-decoration: none;
}
-->
</style>
<title>Whisper Streaming</title>
</head>
<body bgcolor="#333333">
<?php
$swfurl="live_broadcast.swf?room=" . $username;
$bgcolor="#333333";
$baseurl="";
$wmode="transparent";
?>
<object width="100%" height="500" id="videowhisper_livebroadcast" type="application/x-shockwave-flash" data="<?=$swfurl?>">
<param name="movie" value="<?=$swfurl?>"></param><param bgcolor="<?=$bgcolor?>" /><param name="scale" value="noscale" /> </param><param name="salign" value="lt"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param>
<param name="base" value="<?=$baseurl?>"/><param name="wmode" value="<?=$wmode?>" /></object>

<p>ADD MODEL INFORMATION</p>
     
</body>
</html>
