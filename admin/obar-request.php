<?php include("obar-head.php"); ?>
<body>

    <!-- Start Header Top Area -->
    <?php include("obar-header.php"); ?>
    <!-- End Header Top Area -->
    <?php include("obar-menus.php"); ?>
    <!-- Start Status area -->
<div class="notika-status-area">
<div class="container" style="padding-left:0;">
<div class="row" style="padding:0px;">
<div class="col-sm-12" style="padding:0px;">  
<div id="msgbox"></div>

<div class="box box-primary">
<div class="box-header with-border"><h3 style="margin:0;">Request Items From Store</h3></div>
<div class="box-body table-responsive no-padding" style="margin-top:10px;">
<div class="col-sm-6" style="padding:0 0 20px 0;">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post">
<input type="hidden" name="dwat" value="addbarrequest" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />
<input type="hidden" name="bartype" value="1" />

<div class="col-sm-12">
<label>Item Name:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="hidden" name="barlabel" id="barlabel" value="" />
<select name="barname" id="barname" class="form-control" onChange="document.getElementById('barlabel').value = this.options[this.selectedIndex].text;">
<option value="" selected="selected"></option>
<?php
echo getStoreItemsOptionsDirect('1');
?>
</select>
</div>
</div>


<div class="col-sm-12">
<label>Quantity:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="qty" class="form-control" placeholder="Quantity">
</div>
</div>


<div class="col-md-11" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;">Update</button>
</div>
</form>
</div>
</div>
</div>

<div>
</div>
			
</div>
</div>
		 
		 
		 </div>
    </div>
    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
 
<?php include("obar-footer.php"); ?>
</body>
</html>