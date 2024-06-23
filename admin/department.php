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
           <?php include_once 'inc/sidebar.php'; ?>
           <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            DEPARTMENT
            </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Add Department</li>
          </ol>

        </section>
        <!-- Main content -->
        <section class="content" >
 <div class="panel panel-info">
  <div class="panel-heading"><a href="#"><button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#add_dept" ><i class="fa fa-plus"></i>Add Department</button>
  </a></div>
  <div class="panel-body">

<?php

  $department ='
    <div>
    <h2>Department List</h2>
    <table class="table table-striped">
    <thead>
    <tr>
    <th>DEPARTMENT ID</th>
    <th>DEPARTMENT NAME</th>
    <th>DEPARTMENT BUDGET</th>
    <th>ACTION</th>
    <tr>
    <thead>
  ';

  $query= mysqli_query($conn4as,"SELECT * FROM department");
  $deptnumrows = mysqli_num_rows($query);

  if ($deptnumrows != 0){

    while ($row = mysqli_fetch_assoc($query)){

      $deptId = $row['id'];
      $deptName = $row['department_name'];
      $deptBudget = $row['department_budget'];
      
      $department.='
          <tbody>
          <tr>
          <td>'.$deptId.'</td>
          <td>'.$deptName.'</td>
          <td>'.$deptBudget.'</td>
          <td><button>Edit</button><button>Delete</button></td>
      ';
    }
    $department.='
      </table>
      <div>
    ';
}else{


  echo "Table Error! Not Displaying......";

  }

  echo $department;

?>
  </div>
</div>

<div id="add_dept" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Department</h4>
      </div>
      <div class="modal-body">

        <?php

$deptName = $_POST['department_name'];
$deptBudget = $_POST['department_budget'];


if (isset($_POST['submit'])){

  if ($deptName && $deptBudget){

  $query = mysqli_query($conn4as,"SELECT department_name FROM department WHERE department_name = '$deptName' ");
  $deptCount = mysqli_num_rows($query);

  if ($deptCount != O){

      echo "<script> alert('The name already exist! Use another')</script>";
  }else{

    mysqli_query($conn4as,"INSERT INTO department (department_name,department_budget) VALUES ('$deptName','$deptBudget')");
    
    echo "<script> alert('Department added Successfuly!')</script>.<meta http-equiv=refresh content=\"0; URL=department.php\">";



  }

}else{

echo "<script> alert('You form is not completely filled')</script>";

}




}



?>
                
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="row">
          <div class="col-md-6">
<label>Department Name</label>
               <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" name="department_name" placeholder="Department Name">
             </div>
          </div> 

           <div class="col-md-6">
<label>Department Budget</label>
               <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" name="department_budget" placeholder="Department Budget">
             </div>
          </div>        
        
         <div class="col-md-2" style="padding-top:23px;">
            <div class="input-group-btn" >
<button class="btn btn-info" type="submit"  name="submit"><i class="fa fa-plus-square-o"></i>&nbsp;ADD DEPARTMENT</button></div>
</div>
                    
</div>
              

    </form>
     

  </div>
</div>
             
          

        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <?php include_once 'inc/footer.php'; ?>
