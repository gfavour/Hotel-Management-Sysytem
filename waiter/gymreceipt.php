<?php include_once 'inc/head.php'; ?>
<?php include_once 'gymreporthead-pos.php'; ?>
<div>
<div style="font-size:10px !important;">
			               		
					<div style="margin-top:1px;">
				    <?php
				  	$invoiceid = $_GET["invoiceid"];
					$sql = select("SELECT gym.id,gym.surname,gym.firstname,gym1.regno,gympayments.invoiceid,gympayments.duration,gympayments.startdate,gympayments.enddate,gympayments.amount,gympayments.amountpaid FROM gym INNER JOIN gym1 ON gym.id = gym1.userid INNER JOIN gympayments ON gym.id = gympayments.userid WHERE (gympayments.invoiceid = '".mysqli_escape_string($conn4as,$invoiceid)."') ORDER BY gym.id DESC");
					if($sql){				  
						while($rs = mysqli_fetch_assoc($qry)){
							echo '<div class="width-div-2x" style="margin-bottom:20px;">';
							echo '<strong>Invoice ID: </strong>'.$rs["invoiceid"].'<br>';
							echo '<strong>CWF No: </strong>'.$rs["regno"].'<br>';
							echo '<div><strong>Name: </strong>'.$rs["surname"].' '.$rs["firstname"].'</div>';
							echo '<strong>Duration: </strong>'.$rs["duration"].' month(s)<br>';
							echo '<strong>Start Date: </strong>'.$rs["startdate"].'<br>';
							echo '<strong>End Date: </strong>'.$rs["enddate"].'<br>';
							echo '<strong>Due Amount: </strong>'.$sign.number_format($rs["amount"],0).'<br>';
							echo '<strong>Paid Amount: </strong>'.$sign.number_format($rs["amountpaid"],0).'<br>';
							echo '</div>';
						}
					}else{
						echo 'Receipt not found.';
					}
				?>
			    </div>
				
              </div>
</div>

<?php include_once 'gymreportfooter-pos.php'; ?>
<?php include_once 'inc/footer.php'; ?><script> window.print();</script>