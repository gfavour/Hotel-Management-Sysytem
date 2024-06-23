<div class="row" style="padding:0px;">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<div class="col-sm-9" style="padding:0px;">
<div class="col-sm-12" style="padding:0px;">  
<div id="containeritems" style="height:200px !important;">              
  <?php
  $sql = "SELECT * FROM addbar ORDER BY id LIMIT 329";
  $qry = mysqli_query($conn4as,$sql);
  $total = mysqli_num_rows($qry);
  //$sql = select2nav("SELECT COUNT(id) AS ctn FROM addbar ORDER BY name","SELECT * FROM addbar ORDER BY name");
  if ($total > 0){
  while($rs = mysqli_fetch_assoc($qry)){
  echo '<label for="barcheck-'.$rs["id"].'" id="'.$rs["barcode"].'" class="col-sm-3 itemlabel">';
  echo '<input type="checkbox" id="barcheck-'.$rs["id"].'" name="barcheck[]" value="'.$rs["id"].'" style="position:absolute; width:10px; height:10px;" onclick="calculatembar()">';
  echo '<div style="text-align:center; font-size:14px;">'.$rs["name"].'</div>';
  //echo '<div style="margin:0 0 10px 0;"></div>';
  echo '<div style="margin:0 0 10px 0;"><strong>Item Left:</strong> <span class="pull-right">'.$rs["itemleft"].'</span></div>';
  
  echo '<div style="margin:0 0 10px 0;"><strong>Quantity:</strong> <input type="number" name="barquantity'.$rs["id"].'" id="barquantity'.$rs["id"].'" value="1" class="pull-right" onchange="calculatembar()" onkeyup="calculatembar()" style="width:80px;padding-left:5px;"></div>';
  
  echo '<div style="margin:0 0 10px 0;"><strong>Unit Price:</strong> <input type="number" readonly name="barprice'.$rs["id"].'" id="barprice'.$rs["id"].'" value="'.$rs["price"].'" class="pull-right" style="width:80px;padding-left:5px;background:none;border:#ccc solid 1px;"></div>';
  echo '<div style="margin:0 0 0 0;"><strong>Total:</strong> <input type="number" name="bartotal'.$rs["id"].'" id="bartotal'.$rs["id"].'" readonly value="" class="pull-right" style="width:80px;padding-left:5px;background:none;border:#ccc solid 1px;"></div>';
  echo '</label>';
  }
  }
  //echo '<br clear="all">'.$nav;
  
  ?>						 
  </div>
  
</div>
</div>
  
  
<div class="col-sm-3" style="padding:0;">
<div id="msgbox"></div>
<div class="barbcsidebar" style="padding-top:10px !important; padding-bottom:10px !important;"><input type="text" class="form-control" name="search" id="search" placeholder="Search..." /></div>
<?php include("obar-sidebar.php"); ?>
</div>

</form>
</div>