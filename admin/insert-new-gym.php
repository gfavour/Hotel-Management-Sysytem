<div class="box box-primary" style="margin-top:10px; display:none;" id="jqdiv1">
<div class="box-header">
<h3 class="box-title" style="margin-left:15px;">Membership Registration Form</h3>
</div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="addgym1" />

<div class="col-sm-4">
<label>Surname</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="lastname" class="form-control" placeholder="Surname">
</div>
</div>

<div class="col-sm-4">
<label>First Name</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="firstname" class="form-control" placeholder="First Name">
</div>
</div>

<div class="col-sm-4">
<label>Address</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="address" class="form-control" placeholder="Address">
</div>
</div>


<div class="col-sm-4">
<label>Email Address</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="email" class="form-control" placeholder="Email Address">
</div>
</div>

<div class="col-sm-4">
<label>Phone Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-phone"></i></span>
<input type="text" name="phone" class="form-control" placeholder="Phone Number">
</div>
</div>


<div class="col-sm-4">
<label>Gender</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="gender" id="gender" class="form-control">
<option value="M">Male</option>
<option value="F">Female</option>
</select> 
</div>
</div>


<div class="col-md-4">
<label>Date of Birth</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="date" class="form-control" name="dob" placeholder="Date of Birth">  
</div>  
</div> 

<div class="col-md-4">
<label>Occupation</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" class="form-control" name="occupation" placeholder="Occupation">  
</div>  
</div>

<div class="col-md-4">
<label>State of Origin</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" class="form-control" name="origin" placeholder="State of Origin">  
</div>  
</div> 

<div class="col-md-4">
<label>Local Govt Area</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" class="form-control" name="lga" placeholder="LGA">  
</div>  
</div>


<div class="col-md-4">
<label>Nationality</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
  <select name="country" id="country" title="country" class=" form-control">
  <?php
  if(select("select * from tblcountry order by id")){
	  while($rs3 = mysqli_fetch_assoc($qry)){
			echo '<option value="'.$rs3["country"].'">'.$rs3["country"].'</option>';  
	  }
  }else{
  	echo '<option value="">No Country</option>';
  }
  ?>
  </select>
</div>  
</div> 

<!--
<div class="col-sm-4">
<label>Emergency Name & Phone No.</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-phone"></i></span>

</div>
</div>
-->

<div class="col-sm-4">
<label>Next of Kin Full Name:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="hidden" name="enametel" class="form-control" value="">
<input type="text" name="nokname" class="form-control" placeholder="Next of Kin Name:">
</div>
</div>


<div class="col-sm-4">
<label>Next of Kin Address:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="nokaddress" class="form-control" placeholder="Next of Kin Address:">
</div>
</div>

<div class="col-sm-4">
<label>Next of Kin Mobile No:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-phone"></i></span>
<input type="text" name="nokphone" class="form-control" placeholder="Next of Kin Mobile No:">
</div>
</div>


<div class="col-sm-4">
<label>How would you like us to contact you?</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="how2contact" id="how2contact" class="form-control">
<option value="">Select...</option>
<option value="Phone">Phone</option>
<option value="Email">Email</option>
<option value="Letter">Letter</option>
<option value="Text">Text (SMS)</option>
</select> 
</div>
</div>


<div class="col-sm-4">
<label>How did you hear about us?</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="howuhear" id="howuhear" class="form-control">
<option value="">Select...</option>
<option value="Ex-member">Ex-member</option>
<option value="Internet">Internet</option>
<option value="Facebook">Facebook</option>
<option value="Referral">Referral</option>
<option value="Twitter">Twitter</option>
</select> 
</div>
</div>

<div class="col-sm-4">
<label>Attach Photo</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="file" name="file1" class="form-control">
</div>
</div>

<hr />

<div class="col-sm-4">
<label>Smoker</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="smoker" id="smoker" class="form-control">
<option value="Yes">Yes</option>
<option value="No">No</option>
</select> 
</div>
</div>

<div class="col-sm-4">
<label>Alcohol Per Week:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="alcoholperwk" class="form-control">
</div>
</div>


<div class="col-sm-8">
<label>About Your Training Goals:</label><br />
<div style="border:#ddd solid 1px; padding-top:5px; padding-bottom:0px;">
<?php
foreach($gymGoals as $gk=>$gv){
	echo '<label class="col-sm-3"><input type="checkbox" name="goals[]" id="goals" value="'.$gk.'"> '.$gv.'</label>';
}
?>
<br clear="all" />
</div></div>


<div class="col-sm-12" style="
margin-bottom:10px;">
<label>Your General Health (Please Indicate if any apply):</label><br />
<div style="border:#ddd solid 1px; padding-top:5px; padding-bottom:0px;">
<?php
foreach($gymHealths as $hk=>$hv){
	echo '<label class="col-sm-3"><input type="checkbox" name="ghealths[]" id="ghealths" value="'.$hk.'"> '.$hv.'</label>';
}
?>
<br clear="all" />
</div></div>

<div class="col-sm-4">
<label>How much water do you drink daily?</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="waterdaily" id="waterdaily" class="form-control">
</div>
</div>

<div class="col-sm-4">
<label>When do you normally eat for breakfast?</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="mmeal" id="mmeal" class="form-control" placeholder="Midday Meal?" style="width:50%;">
<input type="text" name="emeal" id="emeal" class="form-control" placeholder="Evening Meal?" style="width:50%;">
</div>
</div>


<div class="col-sm-4">
<label>Do you have a healthy diet?</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="healthdiet" id="healthdiet" class="form-control">
<option value="Yes">Yes</option>
<option value="No">No</option>
</select> 
</div>
</div>

<div class="col-sm-8">
<label>Additional Medical Notes: <i>I am interested in games and fitness (Platinum Card) valid for 6-12 months be a full club member and save 30% and 20% Hotel Accommodation</i></label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="mednotes" id="mednotes" class="form-control">
<option value="Yes">Yes</option>
<option value="No">No</option>
</select> 
</div>
</div>

<div class="col-sm-4">
<label>What are your food weaknesses? I am interested in a private personal trainer</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="foodweak" id="foodweak" class="form-control">
<option value="Yes">Yes</option>
<option value="No">No</option>
</select> 
</div>
</div>

<div class="col-md-12" style="margin:10px 0; padding:10px; background:#F4FBF0;">


<div class="col-sm-4">
<label>Membership Duration:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="duration" id="duration" class="form-control">
<option value="">Select...</option>
<?php
foreach($gymDurations as $dk=>$dv){
	echo '<option value="'.$dk.'">'.$dv[1].' ('.$sign.number_format($dv[3],0).')</option>';
}
?>
</select> 
</div>
</div>


<div class="col-sm-4">
<label>Membership Type:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="membertype" id="membertype" class="form-control">
<option value="">Select...</option>
<?php
foreach($memberTypes as $mk=>$mv){
	echo '<option value="'.$mk.'">'.$mv.'</option>';
}
?>
</select> 
</div>
</div>

<div class="col-sm-4">
<label>Direct Debit Type:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="debittype" id="debittype" class="form-control">
<option value="Yes">Yes</option>
<option value="No">No</option>
</select> 
</div>
</div>


<div class="col-sm-4">
<label>Payment Type:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="paymenttype" id="paymenttype" class="form-control">
<option value="">Select...</option>
<?php
foreach($paymentTypes as $pk=>$pv){
	echo '<option value="'.$pk.'">'.$pv.'</option>';
}
?>
</select> 
</div>
</div>

<!--
<div class="col-sm-4">
<label>Registration Fee:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
</div>
</div>
-->

<div class="col-sm-4">
<label>Payment Amount:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="number" name="amount" id="amount" class="form-control" value="0">
<input type="hidden" name="ddamount" id="ddamount" class="form-control" value="0">
<input type="hidden" name="regfee" id="regfee" class="form-control" value="0">
</div>
</div>

<!--
<div class="col-sm-4">
<label>If DD, cash amount pid on joining:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>

</div>
</div>
-->

</div>

<!--<div class="col-md-7" style="margin:10px 0; padding:10px; background: #FCE8E2;">
<div class="col-sm-6">
<label>TOTAL:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="number" name="total" id="total" readonly class="form-control" value="0">
</div>
</div>

<div class="col-sm-6">
<label>Enter Amount Paid:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="number" name="amountpaid" id="amountpaid" class="form-control" value="0">
</div>
</div>

</div>
-->

<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Submit</button>
</div>
</form>
</div>
</div>