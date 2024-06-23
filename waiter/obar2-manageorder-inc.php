<div class="row" style="padding:0px;">
<form name="frm1" id="frm1" action="../fxn/process2.php" method="post" enctype="multipart/form-data">

<div style="padding:0;">
<div id="msgbox"></div>
<?php include("obar2-sidebar.php"); ?>
<div class="barbcsidebar box"  style="padding:10px 10px !important;border:#ccc solid 1px;border-top:#e7d2e2 solid 3px; margin-top:10px;background: rgb(231,210,226) !important;background: linear-gradient(0deg, rgba(231,210,226,0.5) 0%, rgba(255,255,255,0.5) 100%) !important;">
<input type="text" class="form-control" name="search" id="search" placeholder="Search..." style="padding:21px 10px !important;" />

</div>
</div>

<div style="padding:0px; height:650px; overflow:auto;background: rgb(238,238,238);background: linear-gradient(180deg, rgba(238,238,238,1) 60%, rgba(255,255,255,1) 100%);border-radius:5px 5px 0 0;">  
<div id="containeritems" style="text-align:center;">              
  <?php
  $sql = "SELECT * FROM addbar2 ORDER BY name";
  $qry = mysqli_query($conn4as,$sql);
  $total = mysqli_num_rows($qry);
  if ($total > 0){
  while($rs = mysqli_fetch_assoc($qry)){ //width:235px;
  echo '<label for="barcheck-'.$rs["id"].'" id="'.$rs["barcode"].'" class="itemlabel">';
  echo '<div class="col-sm-12" style="padding-left:0; margin-bottom:10px; font-size:16px; color:#333;"><input type="checkbox" id="barcheck-'.$rs["id"].'" name="barcheck[]" value="'.$rs["id"].'" style="position:absolute; width:1px; height:1px;" onclick="calculatembar()"> '.$rs["name"].' (<span style="color:#f00;">'.$rs["itemleft"].'</span>)</div>';
    
  echo '<div class="col-sm-12" style="padding-left:0; text-align:left;"><strong class="labely">Price:</strong> <input type="number" readonly name="barprice'.$rs["id"].'" id="barprice'.$rs["id"].'" value="'.$rs["price"].'" style="width:80px;padding:5px;background:none;border:#ccc solid 0px;"><br><strong class="labely">Qty:</strong> <input type="number" name="barquantity'.$rs["id"].'" id="barquantity'.$rs["id"].'" value="1" onchange="calculatembar()" onkeyup="calculatembar()" style="width:100px;padding:5px;border:#ccc solid 1px;"><br><strong class="labely">Total:</strong> <input type="number" name="bartotal'.$rs["id"].'" id="bartotal'.$rs["id"].'" readonly value="" style="width:100px;padding:5px;background:#eee;border:#ccc solid 1px;"></div>';
  echo '</label>';
  }
  }
  ?>						 
  </div>
  
</div>

</form>
</div>