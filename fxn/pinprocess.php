<?php
require_once('connection.php');

if ($_POST["dwat"] == 'requestpins'){
	$noperpin = $_POST["noperpin"];
	$securitykey = $_POST["securitykey"];
		
	if(!preg_match("/^[1-9][0-9]*$/",$noperpin)){echo 'Number of Digit Per Pin is required';}
	elseif($_POST["pintype"] == ""){echo 'Pin type is required.';}
	elseif($securitykey == ""){echo 'Your security key is required.';}
	else{
		//send by cURL...to http://www.progmatech.com/pingen/
		$params = 'noperpin='.$noperpin.'&securitykey='.$securitykey.'&pintype='.$_POST["pintype"].'&dwat=requestpins&url='.$_SERVER['HTTP_HOST'];
		$newpins = sendbycURL($devURL, $params);
		
		if ($newpins == 'E1'){echo 'Number of Digit Per Pin is required..';}
		else if ($newpins == 'E2'){echo 'Pin type is required.';}
		else if ($newpins == 'E3'){echo 'Your security key is required.';}
		else if ($newpins == 'E4'){echo 'Security key not match.';}
		else{
		$newpinsStr = $newpins;
		$newpins = unserialize($newpins);
		
		if (is_array($newpins)){
			//$sql = "INSERT INTO tblpins(pin,serialno,pinstatus,used4reg,used4res,datecreated,securitykey) VALUES";
			foreach($newpins as $newpin){
				if ($newpin != ""){ //Pin-Serial-Securitykey-datecreated
				$eachno = explode("<->",$newpin);
				if ($sql == ''){
				$sql .= "('".mysqli_real_escape_string($conn4as,$eachno[0])."','".mysqli_real_escape_string($conn4as,$eachno[1])."',0,0,0,'".mysqli_real_escape_string($conn4as,$eachno[3])."','".mysqli_real_escape_string($conn4as,$eachno[2])."')";
				}else{
				$sql .= ",('".mysqli_real_escape_string($conn4as,$eachno[0])."','".mysqli_real_escape_string($conn4as,$eachno[1])."',0,0,0,'".mysqli_real_escape_string($conn4as,$eachno[3])."','".mysqli_real_escape_string($conn4as,$eachno[2])."')";
				}
				$c++;
				}
			}
			$sql = "INSERT INTO pins(pin,serialno,pinstatus,used4reg,used4res,datecreated,securitykey) VALUES".$sql;
			$returned_securitykey = $eachno[2];
			mysqli_query($conn4as,$sql);
			if($c > 1){
				echo 'Total of '.$c.' PIN(s) has been generated with security key '.$returned_securitykey;
			}elseif($c == 1){
				echo 'A PIN has been generated with security key '.$returned_securitykey;
			}
			//echo $sql;
		}else{
			echo "There is an issue. ".$newpinsStr;
		}
		}
		
	}
}

?>