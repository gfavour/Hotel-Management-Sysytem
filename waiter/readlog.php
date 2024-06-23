<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php
if ($globalrole != 'admin'){
redirect("index.php");
}
?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Log History</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">log history</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
		<div id="msgbox"></div>
		
		<div>
		<?php
		$file = "../logs/".$_GET["f"];
		if ($_GET["f"] != ''){
		if(is_file($file)){
		echo '<a href="javascript:confirmurl(\'Are you sure you want to delete this log file: '.$_GET["f"].'\',\'logs.php?dwat=dellog&f='.$_GET["f"].'\');" class="btn btn-danger">Delete this log file</a> <a href="logs.php" class="btn btn-info">Back to log history</a><pre style="height:500px; overflow:auto; margin:20px 0 0 0; background:#fff;">';
        echo ReadFromFile($file);
		echo '</pre>';
		}else{
		echo 'Log history not found. Go back to <a href="logs.php">log history</a>';
		}
		}
		?>
		</div>
		
            </div>
          </div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>