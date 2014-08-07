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
                <div class='well'><table>
                <tr><td>
                  <a href='channel.php?n=$stream'><IMG width='50%' height='50%' class='thumbnail img-responsive' SRC='snapshots/$stream.jpg' BORDER=0></a>
                </td>$stream<br/> age: 26<td></td></tr>
                </table>
                </div>
            </div>");
    fclose($fp);
  }
  
}


?>loadstatus=1