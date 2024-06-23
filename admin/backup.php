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
          <h1>Backup</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">backup</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
		<div id="msgbox" class="autohideMe"></div>
		
		<div>
		<?php
		$dir001 = __DIR__ ;
		$dir002 = explode("admin",$dir001);
		$dir003 = $dir002[0];
		?>
		<a href="?dwat=newbackup" class="btn btn-info">Backup Database</a>
		<a href="javascript:;" class="btn btn-warning" id="jqbtn1">Schedule Database Backup (auto)</a> 
		<!--<a href="file:///<?php echo $dir003; ?>/backup/" target="_blank" title="file:///<?php echo $dir003; ?>/backup/" class="btn btn-warning">Open Backup Folder</a>-->
		<?php
		include("insert-scedule-date-backup.php");
		//echo date("D").' - '.date("H:i");
		?>
		
		<br clear="all" />
		<div class="col-sm-6" style="height:300px; overflow:auto; margin:20px 0 0 0;border-radius:5px; padding:20px; background:#fff;">
		<?php
		echo "Open <strong>".$dir003."backup</strong> folder to access backup files.<br>";
		?>
		<?php
		$dir = "../backup";
		if (!file_exists($dir)){ mkdir($dir, 0777); }
		if ($_GET["dwat"] == 'newbackup' && $globalrole == 'admin'){
			backup($dir);		
		}
		
		if ($_GET["dwat"] == 'delbackup' && $globalrole == 'admin'){
		unlink($dir.'/'.$_GET["f"]);
		}
		
		if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
			if(is_file($dir.'/'.$file)){
			$txt = explode(".txt",$file);
            echo '<a href="'.$dir.'/'.$txt[0].'" target="_Blank" style="display:block;font-size:100%; margin:5px;color:#333; background:#fff;text-align:left;"><i class="fa fa-file" style="font-size:18px;"></i> '.$txt[0].'</a>';
			}
        }
        closedir($dh);
    }
}
		?>
		</div>
		</div>
		
            </div>
          </div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>