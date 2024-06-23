<?php include("obar-head.php"); ?>
<body>

    <!-- Start Header Top Area -->
    <?php include("obar-header.php"); ?>
    <!-- End Header Top Area -->
    <?php include("obar-menus.php"); ?>
    <!-- Start Status area -->
    <div class="notika-status-area" style="padding:0px;">
        <div class="container" style="padding:0px;">
		 <?php include("obar-manageorder-inc.php"); ?>
		 </div>
    </div>
    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
 
<?php include("obar-footer.php"); ?>
<?php //include("direct2printer.html"); 
mysqli_free_result($rs);
?>
<script>
$(document).ready(function () {
  $('#containeritems').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
</body>
</html>