<?php
include("header.php");
?>

<div style="padding:20px"><form id="adminForm" name="adminForm" method="post" action="live_broadcast.php" onSubmit="return censorName()">
  <b>Provide a Label for your Channel</b><br>
  <br>
  Channel Name / Username
  			<script language="JavaScript">
			function censorName()
			{
				document.adminForm.username.value = document.adminForm.username.value.replace(/^[\s]+|[\s]+$/g, '');
				document.adminForm.username.value = document.adminForm.username.value.replace(/[^0-9a-zA-Z_\-]+/g, '-');
				document.adminForm.username.value = document.adminForm.username.value.replace(/\-+/g, '-');
				document.adminForm.username.value = document.adminForm.username.value.replace(/^\-+|\-+$/g, '');
				if (document.adminForm.username.value.length>2) return true;
				else return false;
			}
			</script>
				
	<input name="username" type="text" id="username" value="Studio" size="12" maxlength="12" onChange="censorName()"/>
    <input type="submit" name="button" id="button" value="Publish Channel" onClick="this.disabled=true; censorName(); this.value='Loading...'; adminForm.submit();" />
<?php
include("settings.php");
if (strstr($rtmp_server, "://localhost/")) echo "<P class='warning'>Warning: You are using a localhost based rtmp address ( $rtmp_server ). Unless you are just testing this with a rtmp server on your own computer, make sure you fill a <a href='http://www.videowhisper.com/?p=RTMP+Applications'>compatible rtmp address</a> in settings.php.</P>";
?>
	</form></div>
	
<div class="info">
  <p><b>Suggestions</b></p>
  <?php
include("flash_detect.php")
?>
  <?php
if (file_exists("uploads/last.html")) include("uploads/last.html");
else echo "No snapshot found.";
?>
</p>
</div>
<?php
include_once("clean_older.php");
?>
</BODY>
