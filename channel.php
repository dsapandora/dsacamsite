<head>
<?php
$n=$_GET["n"];

include("incsan.php");
sanV($n);
if (!$n) exit;

$swfurl="live_watch.swf?n=".urlencode($n);
$bgcolor="#333333";
?><style type="text/css">
<!--
body {
	font-family: Arial, Helvetica, sans-serif;
	background-color: #000;
	font-size: 15px;
	color: #EEE;
}

a
{
	color: #FF6699;
	font-weight: normal;
	text-decoration: none;
}
-->
</style><title><?=$n?> ONLINE</title>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" bgcolor="#000000"><p><strong>You are watching:
        <?=strip_tags($n)?></strong><br></p>
        <div style="background-color:#333; padding:10px; font-size:17px"><font color="#CCCCCC">Whisper <a href="">Streaming</a></font></a></div>
      <p><strong><br />
      </strong></p>
      <?php
$agent = $_SERVER['HTTP_USER_AGENT'];
if( strstr($agent,'iPhone') || strstr($agent,'iPod') || strstr($agent,'iPad')) 
echo "<p><b>iOS detected: If your browser does not support Flash plugin, a transcoded stream could be available (if supported by host): <BR> <a href='ls_transcoder.php?n=$n'>VideoWhisper iOS Transcoder</a></b></p><BR>";
	  ?>
      </td>
  </tr>
  <tr>
    <td height=600 bgcolor="#333333">
	
	<object width="100%" height="100%">

      <param name="movie" value="<?=$swfurl?>" />
      <param bgcolor="<?=$bgcolor?>" />
      <param name="scale" value="noscale" />
      <param name="salign" value="lt" />
      <param name="allowFullScreen" value="true" />
      <param name="allowscriptaccess" value="always" />
      
      <embed width="100%" height="100%" scale="noscale" salign="lt" src="<?=$swfurl?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" bgcolor="<?=$bgcolor?>" />
    </object>
	
	</td>
  </tr>
</table>

	<?php
	include("flash_detect.php");
	?>
