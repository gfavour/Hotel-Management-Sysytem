<?php
include(__DIR__.'/connection.php');

if($_REQUEST["dwat"] == 'launchcw'){
	if($_REQUEST["invid"] == ''){ echo 'Invoice id is required';}
	//elseif($_REQUEST["cardno"] == ''){ echo 'Card number is required';}
	else{
		pclose(popen('start /B E:\vb60\BigHMSDoorLock\BigHMS.exe',"r")); //
		//exec(' "E:\vb60\BigHMSDoorLock\BigHMS.exe|at now" ');
	}
}
?>