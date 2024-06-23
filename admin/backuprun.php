<?php
include('../fxn/connection.php');
$globalid = $_SESSION["amyi15"];
$bkupfile = "../backup/backup-scheduled.txt";

$today = date("Y-m-d");
$todaystamp = strtotime($today);

	  if(file_exists($bkupfile)){
	  		$fcontent = file_get_contents($bkupfile);
			$contents = explode(",",$fcontent);
			
			if($contents[0] == 'w'){
				$day = $contents[1];
				$time = $contents[2];
				$drive = $contents[3];
				$lastupdate = $contents[4];
				$lastupdatestamp = strtotime($lastupdate);
				$nowday = date("D");
				$nowtime = date("H:i");
				$dir = $drive.'\\hotelbackup\\';
				if (!file_exists($dir)){ mkdir($dir,0777); }			
				
				if($day == $nowday && $time <= $nowtime && $lastupdatestamp != $todaystamp){
					//backup and update backup file....
					autobackup('../backup',$dir);
					$log = "w,".$day.",".$time.",".$drive.",".date("Y-m-d"); 
					unlink("../backup/backup-scheduled.txt");
					WriteToFile("../backup/backup-scheduled.txt",$log);
				}
				echo 'Weekly database backup done!';
			}elseif($contents[0] == 'm'){ //m
				$day = $contents[1];
				$time = $contents[2];
				$drive = $contents[3];
				$lastupdate = $contents[4];
				$lastupdatestamp = strtotime($lastupdate);
				$nowday = date("Y-m-d");
				$nowtime = date("H:i");
				$dir = $drive."\\hotelbackup\\";
				if (!file_exists($dir)){ mkdir($dir,0777); }
				
				if($day == $nowday && $time <= $nowtime && $lastupdatestamp != $todaystamp){
					//backup and update backup file....
					autobackup($dir);
					$log = "m,".$day.",".$time.",".$drive.",".date("Y-m-d"); 
					unlink("../backup/backup-scheduled.txt");
					WriteToFile("../backup/backup-scheduled.txt",$log);
				}
				echo 'Monthly database backup done!';
			}
	  }

?>