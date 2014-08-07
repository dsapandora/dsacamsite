<?php
include("header.php");
?>
<div class="info">
<?php
  if (!$stream=$_GET['n']) exit;


  include_once("incsan.php");
  sanV($stream);
   include_once("settings.php"); 

echo "<H3>".$stream."</h3>";


   $upath = getcwd() . "/uploads/$stream/";


$cmd = "ps aux | grep '/i_$stream -i rtmp'";
exec($cmd, $output, $returnvalue);
//var_dump($output);

$transcoding = 0;

foreach ($output as $line) if (strstr($line, "ffmpeg"))
{
$columns = preg_split('/\s+/',$line);
echo "Transcoder Active (".$columns[1]." CPU: ".$columns[2]." Mem: ".$columns[3].") <a target=_blank href='ls_transcoderoff.php?n=" . $stream . "'>Close</a>";
$transcoding = 1;
//var_dump($columns);
}

if (!$transcoding)
{
echo "Initiating Transcoder...";
$log_file =  $upath . "videowhisper_transcode.log";
$cmd ="/usr/local/bin/ffmpeg -s 480x360 -r 15 -vb 512k -vcodec libx264 -coder 0 -bf 0 -analyzeduration 0 -level 3.1 -g 30 -maxrate 768k -acodec libfaac -ac 2 -ar 22050 -ab 96k -x264opts vbv-maxrate=364:qpmin=4:ref=4 -threads 4 -rtmp_pageurl http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] . " -rtmp_swfurl http://".$_SERVER['HTTP_HOST']." -f flv " . $rtmp_server . "/i_". $stream . " -i " . $rtmp_server ."/". $stream . " >&$log_file & ";
//echo $cmd;
}
exec($cmd, $output, $returnvalue);

//killall -9 ffmpeg


?>

<p>iOS live stream link (open with Safari or test with VLC): <a href="<?=$httpstreamer?>i_<?=$stream?>/playlist.m3u8"><br />
  <?=$stream?> Video</a></p>

<p>HTML5 live video embed below should acessible only in Safari  (PC or iOS):</p>
<video width="480" height="360" autobuffer autoplay controls="controls">o
  <p>&nbsp;</p>
 <source src="<?=$httpstreamer?>i_<?=$stream?>/playlist.m3u8" type='video/mp4'>
    <div class="fallback">
	    <p>You must have an HTML5 capable browser.</p>
	</div>
</video>
<p>Playback of live transcoded streams over HTTP requires   packetizers available with <a href="http://www.videowhisper.com/?p=Wowza+Media+Server+Hosting">Wowza Hosting</a> and optimisations available with VideoWhisper plans.<br />
  Due to HTTP based live streaming technology limitations, video can have 15s or more latency. Use a browser with flash support for faster interactions based on RTMP.</p>
</div>
