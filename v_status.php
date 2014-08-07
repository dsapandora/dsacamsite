<?
/*
POST Variables:
u=Username
s=Session, usually same as username
r=Room
ct=session time (in milliseconds)
lt=last session time received from this script in (milliseconds)
*/

$room=$_POST[r];
$session=$_POST[s];
$username=$_POST[u];
$message=$_POST[m];

$currentTime=$_POST[ct];
$lastTime=$_POST[lt];

$maximumSessionTime=7200000; //900000ms=15 minutes; 0 for unlimited

$disconnect=""; //anything else than "" will disconnect with that message


//code to keep track of total channel use time:
//all usage time ads up (broadcaster + viewers): 10 min broadcast to 2 viewers = 30 min total usage

  include_once("incsan.php");
  sanV($room);
  sanV($session);
  
  if ($room && $session) 
 {
	
	//get time
	$dir= "uploads";
	if (file_exists("$dir/$room/online/$room")) 
	{
		$oldTime = implode(file("$dir/$room/online/$room"));	 
		$timeUsed = $oldTime + ($currentTime-$lastTime);
	}
	
	$dir="uploads";
	if (!file_exists($dir)) mkdir($dir);
	@chmod($dir, 0777);
	$dir.="/$room";
	if (!file_exists($dir)) mkdir($dir);
	@chmod($dir, 0777);
	$dir.="/online";
	if (!file_exists($dir)) mkdir($dir);
	@chmod($dir, 0777);

	$dfile = fopen($dir."/$room","w");
	fputs($dfile, $timeUsed);
	fclose($dfile);
 }
 else 
 {
	$disconnect = "No valid room or session!";
 }

?>timeTotal=<?=$maximumSessionTime?>&timeUsed=<?=$timeUsed?>&lastTime=<?=$currentTime?>&disconnect=<?=$disconnect?>&loadstatus=1