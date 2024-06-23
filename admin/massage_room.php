<?php include_once 'inc/head.php'; ?>

<?php include_once 'inc/header.php'; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <?php include_once 'inc/sidebar.php'; ?><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SPAR CENTER
            </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Spar Room</li>
          </ol>

        </section>
        <!-- Main content -->
        <section class="content" >
 <div class="panel panel-info">
  <div class="panel-heading"><a href="add_massage.php"><button type="button" class="btn btn-primary btn-md"><i class="fa fa-plus"></i>Add Spar Room</button></a>
    </div>
  <div class="panel-body">
<?php

  $massage_room ='
    <div>
    <h2>Massage List</h2>
    <table class="table table-striped">
    <thead>
    <tr>
    <th>MASSAGE NAME</th>
    <th>MASSAGE OPENTIME</th>
    <th>MASSAGE CLOSETIME</th>
    <th>MASSAGE DESCRIPTION</th>
    <th>ACTION</th>
    <tr>
    <thead>
  ';

  $query= mysqli_query($conn4as,"SELECT * FROM massage");
  $masnumrows = mysqli_num_rows($query);

  if ($masnumrows != 0){

    while ($row = mysqli_fetch_assoc($query)){

      $masRoom = $row['massage_room'];
      $masOpen = $row['massage_opentime'];
      $masClose = $row['massage_closetime'];
      $masDes = $row['massage_description'];

      $massage_room.='
          <tbody>
          <tr>
          <td>'.$masRoom.'</td>
          <td>'.$masOpen.'</td>
          <td>'.$masClose.'</td>
          <td>'.$masDes.'</td>
          <td><button>Edit</button><button>Delete</button></td>
      ';
    }
    $massage_room.='
      </table>
      <div>
    ';
}else{


  echo "Table Error! Not Displaying......";

  }

  echo $massage_room;

?>


  </div>
</div>

          

        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <?php include_once 'inc/footer.php'; ?>
