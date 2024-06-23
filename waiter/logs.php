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
		<?php
		$dir001 = __DIR__ ;
		$dir002 = explode("admin",$dir001);
		$dir003 = $dir002[0];
		?>
		<?php
		echo "Kindly open <strong>".$dir003."\logs</strong> folder to backup files.<br><br>";
		?>
		<div>
		<?php
		$dir = "../logs";
		
		if ($_GET["dwat"] == 'dellog' && $globalrole == 'admin'){
		unlink($dir.'/'.$_GET["f"]);
		}
		
		if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
			if(is_file($dir.'/'.$file)){
				$txt = explode(".txt",$file);
            	echo '<a href="readlog.php?f='.$file.'" class="col-xs-1" style="padding:20px 10px; margin:10px 10px 10px 0px; border:#ccc solid 1px;font-size:100%;color:#333; background:#fff;text-align:center;"><i class="fa fa-file" style="font-size:18px;"></i><br>'.$txt[0].'</a>';
			}
        }
        closedir($dh);
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