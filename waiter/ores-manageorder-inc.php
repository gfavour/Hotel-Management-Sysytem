<div class="row" style="padding:0px;">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<div class="col-sm-9" style="padding:0px;">
<div class="col-sm-12" style="padding:0px;">  
<div id="containeritems">              
  <?php
  $sql = "SELECT * FROM addresturant ORDER BY name";
  $qry = mysqli_query($conn4as,$sql);
  $total = mysqli_num_rows($qry);
  if ($total > 0){
  while($rs = mysqli_fetch_assoc($qry)){ //width:235px;
  echo '<label for="rescheck-'.$rs["id"].'" id="'.$rs["rescode"].'" class="col-sm-3 itemlabel">';
  echo '<input type="checkbox" id="rescheck-'.$rs["id"].'" name="rescheck[]" value="'.$rs["id"].'" style="position:absolute; width:10px; height:10px;" onclick="calculatemres()">';
  echo '<div style="text-align:center; font-size:14px;">'.$rs["name"].'</div>';
  //echo '<div style="margin:0 0 10px 0;"></div>';
  //echo '<div style="margin:0 0 10px 0;"><strong>Item Left:</strong> <span class="pull-right">'.$rs["itemleft"].'</span></div>';
  
  echo '<div style="margin:10px 0 10px 0;"><strong>Quantity:</strong> <input type="number" name="resquantity'.$rs["id"].'" id="resquantity'.$rs["id"].'" value="1" class="pull-right" onchange="calculatemres()" onkeyup="calculatemres()" style="width:80px;padding-left:5px;"></div>';
  
  echo '<div style="margin:0 0 10px 0;"><strong>Unit Price:</strong> <input type="number" readonly name="resprice'.$rs["id"].'" id="resprice'.$rs["id"].'" value="'.$rs["price"].'" class="pull-right" style="width:80px;padding-left:5px;background:none;border:#ccc solid 1px;"></div>';
  echo '<div style="margin:0 0 0 0;"><strong>Total:</strong> <input type="number" name="restotal'.$rs["id"].'" id="restotal'.$rs["id"].'" readonly value="" class="pull-right" style="width:80px;padding-left:5px;background:none;border:#ccc solid 1px;"></div>';
  echo '</label>';
  }
  }
  ?>						 
  </div>
  
</div>
</div>
  
  
<div class="col-sm-3" style="padding:0;">
<div id="msgbox"></div>
<div class="barbcsidebar" style="padding-top:10px !important; padding-bottom:10px !important;"><input type="text" class="form-control" name="search" id="search" placeholder="Search..." /></div>
<?php include("ores-sidebar.php"); ?>
</div>

</form>
</div>