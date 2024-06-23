<?php
//var_dump($reqs);
//exit();
$ins = '';
if(count($reqs) > 0){
	//Get keys for insert...
	$insk = GetInsertKeys($reqs[0]);
	$inskeys = "REPLACE INTO ".$table."(".$insk.") ";
	//INSERT IGNORE INTO
	foreach($reqs as $key=>$vs){ //0-insert,2-update
		if($vs["issync"] == "0" || $vs["issync"] == "2"){
			$ins .= ($ins == '')?" VALUES(".GetInsertVals($vs).")":",(".GetInsertVals($vs).")";
			$resIDs[] = $vs["id"];
		}elseif($vs["issync"] == "X"){ //CANCELLED
			if(DoUpdate($reqs[$key],$table) == '1'){
				$resIDs[] = $vs["id"];
			}
		}
	}
	if($ins != ''){
		mysqli_query($conn4as,$inskeys." ".$ins);
		//$errVal = $inskeys." ".$ins.'<br>&bull; '.date("Y-m-d h:i A").'<br>----------------------------------<br>';
		//error_log(print_r($errVal, TRUE)); 
	}
	echo implode(",",$resIDs);
}
?>