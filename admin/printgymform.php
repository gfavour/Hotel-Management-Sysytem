<?php include_once 'inc/head.php'; ?>
<div class="col-sm-12" style="text-align:left; padding:30px; border-radius:10px; border:#666 solid 2px;">
<?php include_once 'reporthead.php'; ?>
<h3 style="text-decoration:underline;margin:30px auto 20px auto;width:50%; text-align:center;">Membership Registration Form</h3>
<?php
$sql = select("SELECT * FROM gym WHERE id = '".mysqli_real_escape_string($conn4as,$_GET["id"])."' ORDER BY id");
if($sql){
$rs = mysqli_fetch_assoc($qry);
?>

<div class="col-sm-4">
  <label>Surname</label>
  <div class="form-group input-group">
  <?php echo $rs["surname"]."&nbsp;"; ?>
  </div>
</div>

<div class="col-sm-4">
  <label>First Name</label>
  <div class="form-group input-group">
  <?php echo $rs["firstname"]."&nbsp;"; ?>
  </div>
</div>

<div class="col-sm-4">
  <label>Address</label>
  <div class="form-group input-group">
  <?php echo $rs["address"]."&nbsp;"; ?>
  </div>
</div>

<div class="col-sm-4">
  <label>Email Address</label>
  <div class="form-group input-group">
  <?php echo $rs["email"]."&nbsp;"; ?>
  </div>
</div>

<div class="col-sm-4">
  <label>Phone Number</label>
  <div class="form-group input-group">
  <?php echo $rs["phone"]."&nbsp;"; ?>
  </div>
</div>

<div class="col-sm-4">
  <label>Gender</label>
  <div class="form-group input-group">  
  <?php echo $rs["gender"]."&nbsp;"; ?> 
  </div>
</div>

<div class="col-md-4">
  <label>Date of Birth</label>
  <div class="form-group input-group">  
  <?php echo $rs["dob"]."&nbsp;"; ?>  
  </div>  
</div>

<div class="col-md-4">
  <label>Occupation</label>
  <div class="form-group input-group">  
  <?php echo $rs["occupation"]."&nbsp;"; ?> 
  </div>  
</div>

<div class="col-md-4">
  <label>State of Origin</label>
  <div class="form-group input-group">  
  <?php echo $rs["origin"]."&nbsp;"; ?> 
  </div>  
</div>

<div class="col-md-4">
  <label>Local Govt Area</label>
  <div class="form-group input-group">  
  <?php echo $rs["lga"]."&nbsp;"; ?> 
  </div>  
</div>

<div class="col-md-4">
  <label>Nationality</label>
  <div class="form-group input-group">
      <?php echo $rs["country"]."&nbsp;"; ?>
  </div>  
</div>

<div class="col-sm-4">
  <label>Next of Kin Full Name:</label>
  <div class="form-group input-group">
  <?php echo $rs["nokname"]."&nbsp;"; ?>
  </div>
</div>

<div class="col-sm-4">
  <label>Next of Kin Address:</label>
  <div class="form-group input-group">
  <?php echo $rs["nokaddress"]."&nbsp;"; ?>
  </div>
</div>

<div class="col-sm-4">
  <label>Next of Kin Mobile No:</label>
  <div class="form-group input-group">
  <?php echo $rs["nokphone"]."&nbsp;"; ?>
  </div>
</div>

<div class="col-sm-4">
  <label>How would you like us to contact you?</label>
  <div class="form-group input-group">  
  <?php echo $rs[how2contact]."&nbsp;"; ?>
  </div>
</div>

<div class="col-sm-4">
  <label>How did you hear about us?</label>
  <div class="form-group input-group">  
  <?php echo $rs["howuhear"]."&nbsp;"; ?>
  </div>
</div>

<div class="col-sm-4">
  <label>Attach Photo</label>
  <div class="form-group input-group">
    <?php echo $rs["pic"]."&nbsp;"; ?>
  </div>
</div>
<hr />

<div class="col-sm-4">
  <label>Smoker</label>
  <div class="form-group input-group">
  <?php echo $rs["smoker"]."&nbsp;"; ?>
  </div>
</div>

<div class="col-sm-4">
  <label>Alcohol Per Week:</label>
  <div class="form-group input-group">
  <?php echo $rs["alcoholperwk"]."&nbsp;"; ?>
  </div>
</div>

<div class="col-sm-8">
  <label>About Your Training Goals:</label><br />
  <div class="form-group input-group">
  <?php
  $tgoals = explode(",",$rs["goals"]);
foreach($gymGoals as $gk=>$gv){
	echo (in_array($gk,$tgoals))?'<label class="col-sm-3"><input type="checkbox" name="goals[]" id="goals" value="'.$gk.'" checked> '.$gv.'</label>':'<label class="col-sm-3"><input type="checkbox" name="goals[]" id="goals" value="'.$gk.'"> '.$gv.'</label>';
}
?>
  <br clear="all" />
  </div>
</div>

<div class="col-sm-12" style="margin-bottom:10px;">
  <label>Your General Health (Please Indicate if any apply):</label><br />
  <div class="form-group input-group" style="border:#ddd solid 1px; padding-top:5px; padding-bottom:0px;">
  <?php
  $thealths = explode(",",$rs["ghealth"]);
foreach($gymHealths as $hk=>$hv){
	echo (in_array($hk,$thealths))?'<label class="col-sm-3"><input type="checkbox" name="ghealths[]" id="ghealths" value="'.$hk.'" checked> '.$hv.'</label>':'<label class="col-sm-3"><input type="checkbox" name="ghealths[]" id="ghealths" value="'.$hk.'"> '.$hv.'</label>';
}
?>
  <br clear="all" />
  </div>
</div>

<div class="col-sm-4">
  <label>How much water do you drink daily?</label>
  <div class="form-group input-group">  
  <?php echo $rs["waterdaily"]."&nbsp;"; ?>
  </div>
</div>

<div class="col-sm-4">
  <label>When do you normally eat for breakfast?</label>
  <div class="form-group input-group">  
  <strong>Midday Meal: </strong><?php echo $rs["mmeal"]."&nbsp;"; ?> | <strong>Evening Meal: </strong><?php echo $rs["emeal"]."&nbsp;"; ?>
  </div>
</div>

<div class="col-sm-4">
  <label>Do you have a healthy diet?</label>
  <div class="form-group input-group">
    <?php echo $rs["healthdiet"]."&nbsp;"; ?>
  </div>
</div>

<div class="col-sm-8">
  <label>Additional Medical Notes: <i>I am interested in games and fitness (Platinum Card) valid for 6-12 months be a full club member and save 30% and 20% Hotel Accommodation</i></label>
  <div class="form-group input-group">
  <?php echo $rs["mednotes"]."&nbsp;"; ?> 
  </div>
</div>

<div class="col-sm-4">
  <label>What are your food weaknesses? I am interested in a private personal trainer</label>
  <div class="form-group input-group">  
  <?php echo $rs["foodweak"]."&nbsp;"; ?>
  </div>
</div>

<?php
}else{
	echo 'No record found.';
}
?>
<br clear="all" />
</div>

<style>
body{background:#fff; margin:10px;}
.input-group{border:#ccc solid 1px; width:100%; padding:5px;}
</style>
<script>window.print();</script>