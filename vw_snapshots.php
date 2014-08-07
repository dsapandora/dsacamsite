<?php
if (isset($GLOBALS["HTTP_RAW_POST_DATA"]))
{
  $stream=$_GET['name'];

  include_once("incsan.php");
  sanV($stream);
  if (!$stream) exit;
  
  // get bytearray
  $jpg = $GLOBALS["HTTP_RAW_POST_DATA"];

  // save file
  $fp=fopen("snapshots/$stream.jpg","w");
  if ($fp)
  {
    fwrite($fp,$jpg);
    fclose($fp);
  }
  
  //save last user online
   $fp=fopen("uploads/last.html","w");
   if ($fp)
  {
    fwrite($fp,"<div class='col-md-4'>
                <div class='well'>
                  <a href='channel.php?n=DEMO'><IMG  class='thumbnail img-responsive' SRC='snapshots/DEMO.jpg' BORDER=0></a>
                </div>
            </div>");
    fclose($fp);
  }
  
}


?>loadstatus=1