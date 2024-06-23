<div class="box" style="margin-top:10px; display:none;" id="jqdiv1">
<div class="box-header">
<h3 class="box-title" style="margin-left:15px;">Update Schedule Date/Time</h3>
</div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="write2bkupfile" />
<!--row-->
<div class="col-sm-3">
<label>Interval:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="interval" id="interval" class="form-control" onchange="if(this.value == 'm'){document.getElementById('weekday').style.display='none';document.getElementById('mdate').style.display='block';}else{document.getElementById('weekday').style.display='block';document.getElementById('mdate').style.display='none';}">
<option value="w">Weekly</option>
<option value="m">Monthly</option>
</select> 
</div>
</div>

<div class="col-sm-3">
<label>Day:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="weekday" id="weekday" class="form-control">
<option value="Mon">Monday</option>
<option value="Tue">Tuesday</option>
<option value="Wed">Wednesday</option>
<option value="Thu">Thursday</option>
<option value="Fri">Friday</option>
<option value="Sat">Saturday</option>
<option value="Sun" selected>Sunday</option>
</select> 
<input type="date" name="mdate" id="mdate" class="form-control" value="<?php echo date("Y-m-d"); ?>" style="display:none;">
</div>
</div>

<div class="col-sm-3">
<label>Time:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="time" name="time" class="form-control" value="05:50">
</div>
</div>

<div class="col-sm-3">
<label>Select Drive:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="seldrive" id="seldrive" class="form-control">
<option value="A:">A:</option>
<option value="B:">B:</option>
<option value="C:" selected>C:</option>
<option value="D:">D:</option>
<option value="E:">E:</option>
<option value="F:">F:</option>
<option value="G:">G:</option>
<option value="H:">H:</option>
<option value="I:">I:</option>
<option value="J:">J:</option>
<option value="K:">K:</option>
<option value="L:">L:</option>
<option value="M:">M:</option>
<option value="N:">N:</option>
</select> 
<input type="date" name="mdate" id="mdate" class="form-control" value="<?php echo date("Y-m-d"); ?>" style="display:none;">
</div>
</div>

<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Save Changes</button>
</div>
</form>
</div>
</div>