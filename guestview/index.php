<?php include_once 'inc/head.php'; 
getServiceCategories("room");
getbizlogo();
LoadRoomFacilityArray();//$AllRoomFacilityArray
?>
<div style="width:100%!important; padding:10px 20px; margin:auto">
        <!-- Page Header -->
        <div style="text-align:center; margin-bottom:15px; padding-bottom:15px;border-bottom:#ccc solid 1px; ">
          <h1 style="padding-bottom:1px; margin-bottom:1px;"><?php echo 'WELCOME TO '.strtoupper($globalbizname); ?></h1>
          Below are list of rooms in our hotels. Kindly navigate through the list below for your choice of room.
        </div>

<div class="rowx">
            <div class="">
			<div id="msgbox"></div>
			<?php
				$CheckedInClient = '';
				$sql = select("SELECT * FROM addroom ORDER BY id");
				if($sql){					
				while($rs = mysqli_fetch_assoc($qry)){
					$isCheckedIn = isCheckedIn($rs["id"]);
					$facilities = $rs["facilities"];
					$facarray = []; $facs = '';
					if($facilities != ''){
						$facarray = explode(",",$facilities);
						foreach($facarray as $i){
							$facs .= ($facs == '')?$AllRoomFacilityArray[$i]["name"]:', '.$AllRoomFacilityArray[$i]["name"];
						}
					}
					$roomid = $rs["id"];
					$firstpic = '';
					$imgsHTML = GetRoomImages($roomid); //roompictures
					
					$rmInfo = base64_encode(CarouselMe($imgsHTML,$roomid).'<div style="font-size:16px;padding:10px;"><strong>Room Type: </strong>'.$rs["roomType"].'<br><strong>Price: </strong><span style="color:#0066cc;">'.$cursign.number_format($rs["roomrate"],0).'</span> (per night)<br><strong>Room Category: </strong>'.$AllServiceCats[$rs["categoryid"]]["catname"].'<br><strong>Room Facilities: </strong>'.$facs.'</div>');
					
					if($isCheckedIn == ''){
						$outs .= '<div class="col-sm-4 touchbox"><img src="'.$firstpic.'" class="img-responsive" onclick="ShowGlobalModal(\''.$rmInfo.'\',\'<strong>'.$rs["roomType"].'</strong>\')"><div style="padding:10px 0px;font-size:16px;"><h3 style="margin:5px 0 0 0;">'.$rs["roomType"].'</h3><strong>Price:</strong> <span style="color:#0066cc;">'.$cursign.number_format($rs["roomrate"],0).'</span> (per night)<br>- '.$AllServiceCats[$rs["categoryid"]]["catname"].' -</div></div>';
					}elseif($isCheckedIn == 'in'){
						$ins .= '<div class="col-sm-4 touchbox" style="cursor:text;"><img src="occupied.jpg" class="img-responsive"><div style="padding:10px 10px;font-size:16px;"><h3 style="margin:5px 0 0 0;">'.$rs["roomType"].'</h3><strong>Price:</strong> <span style="color:#0066cc;">'.$cursign.number_format($rs["roomrate"],0).'</span> (per night)<br>- '.$AllServiceCats[$rs["categoryid"]]["catname"].' -</div></div>';
					
					}
				}
				echo $outs.$ins;
				}
			?>
            </div>
          </div>
</div>
<?php include_once 'inc/footer.php'; ?>
<?php
function GetRoomImages($rmid){
global $conn4as,$firstpic;
$qry = mysqli_query($conn4as,"SELECT * FROM roompictures WHERE roomid = '".mysqli_real_escape_string($conn4as,$rmid)."' ORDER BY id");
$total = mysqli_num_rows($qry);
	if($total > 0){
		$rs = mysqli_fetch_assoc($qry);
		if($rs["pic1"] != ''){
		$imgs .= ($imgs == '')?'<div class="item active"><img src="../archives/'.$rs["pic1"].'" class="img-responsive"></div>':'<div class="item"><img src="../archives/'.$rs["pic1"].'" class="img-responsive"></div>';
		if($firstpic == ''){ $firstpic = "../archives/".$rs["pic1"]; }
		}
		/////////////
		if($rs["pic2"] != ''){
		$imgs .= ($imgs == '')?'<div class="item active"><img src="../archives/'.$rs["pic2"].'" class="img-responsive"></div>':'<div class="item"><img src="../archives/'.$rs["pic2"].'" class="img-responsive"></div>';
		if($firstpic == ''){ $firstpic = "../archives/".$rs["pic1"]; }
		}
		//////////////
		if($rs["pic3"] != ''){
		$imgs .= ($imgs == '')?'<div class="item active"><img src="../archives/'.$rs["pic3"].'" class="img-responsive"></div>':'<div class="item"><img src="../archives/'.$rs["pic3"].'" class="img-responsive"></div>';
		if($firstpic == ''){ $firstpic = "../archives/".$rs["pic1"]; }
		}
		//////////////
		if($rs["pic4"] != ''){
		$imgs .= ($imgs == '')?'<div class="item active"><img src="../archives/'.$rs["pic4"].'" class="img-responsive"></div>':'<div class="item"><img src="../archives/'.$rs["pic4"].'" class="img-responsive"></div>';
		if($firstpic == ''){ $firstpic = "../archives/".$rs["pic1"]; }
		}
		//////////////
		if($rs["pic5"] != ''){
		$imgs .= ($imgs == '')?'<div class="item active"><img src="../archives/'.$rs["pic5"].'" class="img-responsive"></div>':'<div class="item"><img src="../archives/'.$rs["pic5"].'" class="img-responsive"></div>';
		if($firstpic == ''){ $firstpic = "../archives/".$rs["pic1"]; }
		}
		//////////////
		if($rs["pic6"] != ''){
		$imgs .= ($imgs == '')?'<div class="item active"><img src="../archives/'.$rs["pic6"].'" class="img-responsive"></div>':'<div class="item"><img src="../archives/'.$rs["pic6"].'" class="img-responsive"></div>';
		if($firstpic == ''){ $firstpic = "../archives/".$rs["pic1"]; }
		}
		//////////////
		if($rs["pic7"] != ''){
		$imgs .= ($imgs == '')?'<div class="item active"><img src="../archives/'.$rs["pic7"].'" class="img-responsive"></div>':'<div class="item"><img src="../archives/'.$rs["pic7"].'" class="img-responsive"></div>';
		if($firstpic == ''){ $firstpic = "../archives/".$rs["pic1"]; }
		}
		//////////////
		if($rs["pic8"] != ''){
		$imgs .= ($imgs == '')?'<div class="item active"><img src="../archives/'.$rs["pic8"].'" class="img-responsive"></div>':'<div class="item"><img src="../archives/'.$rs["pic8"].'" class="img-responsive"></div>';
		if($firstpic == ''){ $firstpic = "../archives/".$rs["pic1"]; }
		}
		//////////////
		if($rs["pic9"] != ''){
		$imgs .= ($imgs == '')?'<div class="item active"><img src="../archives/'.$rs["pic9"].'" class="img-responsive"></div>':'<div class="item"><img src="../archives/'.$rs["pic9"].'" class="img-responsive"></div>';
		if($firstpic == ''){ $firstpic = "../archives/".$rs["pic1"]; }
		}
		//////////////
		if($rs["pic10"] != ''){
		$imgs .= ($imgs == '')?'<div class="item active"><img src="../archives/'.$rs["pic10"].'" class="img-responsive"></div>':'<div class="item"><img src="../archives/'.$rs["pic10"].'" class="img-responsive"></div>';
		if($firstpic == ''){ $firstpic = "../archives/".$rs["pic1"]; }
		}
		//////////////
		if($rs["pic11"] != ''){
		$imgs .= ($imgs == '')?'<div class="item active"><img src="../archives/'.$rs["pic11"].'" class="img-responsive"></div>':'<div class="item"><img src="../archives/'.$rs["pic11"].'" class="img-responsive"></div>';
		if($firstpic == ''){ $firstpic = "../archives/".$rs["pic1"]; }
		}
		//////////////
		if($rs["pic12"] != ''){
		$imgs .= ($imgs == '')?'<div class="item active"><img src="../archives/'.$rs["pic12"].'" class="img-responsive"></div>':'<div class="item"><img src="../archives/'.$rs["pic12"].'" class="img-responsive"></div>';
		if($firstpic == ''){ $firstpic = "../archives/".$rs["pic1"]; }
		}
		if($imgs == ''){
			$imgs = '<div class="item active"><img src="noimage.jpg" class="img-responsive"></div>';
			if($firstpic == ''){ $firstpic = "noimage.jpg"; }
		}
	}else{
		$imgs = '<div class="item active"><img src="noimage.jpg" class="img-responsive"></div>';
	}
	return $imgs;
}

function CarouselMe($imgsHTML,$c){
return '<div id="mainpics_carousel'.$c.'" class="carousel slide" data-ride="carousel"><div class="carousel-inner">'.$imgsHTML.'</div><a class="left carousel-control" href="#mainpics_carousel'.$c.'" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span></a><a class="right carousel-control" href="#mainpics_carousel'.$c.'" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next</span></a></div>';
}
?>