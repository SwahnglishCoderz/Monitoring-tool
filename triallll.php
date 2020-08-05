
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CI MONITOR </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="bootstrap-datepicker/css/bootstrap-datepicker.css">
    <script src="../../datepicker/js/min.js"></script>
    <script src="../../bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- datatable style -->
    <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script type="text/javascript" language="JavaScript" src="../validate.js"></script>

    <![end if]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php
$host = 'localhost';
$username = 'root';
$password='';
$dbconfig = mysqli_connect($host, $username, $password);
mysqli_select_db($dbconfig,"ci_db") or die("cannot select DB");


    ?>
    <header class="main-header">

        <!-- Logo -->
        <a href="main_dashboard -.php" class="logo">
            <!-- mini logo for side bar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">MONITOR TOOL</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Side bar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in drop down.less-->

                    <!-- Notifications: style can be found in drop down.less -->
                    <li class="dropdown notifications-menu">

                    </li>
                    <!-- Tasks: style can be found in drop down.less -->
                    <li class="dropdown tasks-menu">

                    </li>
                    <!-- Control Side bar Toggle Button -->

                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and side bar -->
    <aside class="main-sidebar">
        <!-- side bar: style can be found in side bar.less -->
        <section class="sidebar">
            <!-- Side bar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/img_avatar2.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Administrator<?php // while($row = mysqli_fetch_array($fromuser2)){?><?php //echo ucfirst($row['jina']); ?><?php //}?></p>
                    <a href="main_dashboard -.php"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">

                </div>
            </form>
            <!-- /.search form -->
            <!-- side bar menu: : style can be found in side bar.less -->
            <ul class="sidebar-menu">

                <li>
                    <a href="main_dashboard -.php">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
             
                <li>
                    <a href="general_report.php" data-toggle="modal" data-target="#profit">
                        <i class="fa fa-bar-chart"></i> <span>General Report</span>
                    </a>
                </li>
                <li>
                    <a href="SearchbyCluster.php">
                        <i class="fa fa-database"></i> <span>Clusters' Report</span>
                        <span class="pull-right-container">
                         <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>              
                
                <li>
                    <a href="SearchbyCenter.php">
                        <i class="fa fa-database"></i> <span>Centers' Report</span>
                        <span class="pull-right-container">
                         <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                
                <li>
                    <a href="search.php">
                        <i class="fa fa-database"></i> <span>Advanced Search</span>
                        <span class="pull-right-container">
                         <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                
                <li>
                    <a href="search_date.php">
                        <i class="fa fa-database"></i> <span>Search By Date</span>
                        <span class="pull-right-container">
                         <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                
                <li>
                    <a href="final.php">
                        <i class="fa fa-database"></i> <span>Upload CSV File</span>
                        <span class="pull-right-container">
                         <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-database"></i> Report View
            </h1>
            <ol class="breadcrumb">
                <li><a href="main_dashboard -.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Report View</li>
            </ol>
        </section>
        <section class="content">
            <!-- Info boxes -->
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>&nbsp;&nbsp;
                    <div class="row">
                        <div class="col-sm-12">
                            <p>
                            <div>

                            <center><a href="general_report.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#addstock">General Report</a>
                            <a href="SearchbyCluster.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#update">Clusters' Report</a>
                            <a href="SearchbyCenter.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#update">Centers' Report</a>
                            <a href="search.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#update">Advanced Search</a>
                            <a href="search_date.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#update">Search by Date</a>
                            <a href="upload_file/final.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#addstock">Upload CSV File</a>
                            </div>
                            </p>                                  
                        </div>
                        
                        

                        <div class="col-sm-5"></div>

                        <div class="col-sm-2 ">
                            <p class="pull-left">

                            </p>
                        </div>
                    </div>
                        
                    </div>
            </div>
                    
                </div>
                
                     </section> 
                    </div> 
                            
                </div>
            
    <div class="log">
     
                       <?php  
$connect = mysqli_connect("localhost", "root", "", "ci_db");
$sql = "SELECT center_id, center_name from centers";
$result = mysqli_query($connect,$sql);
$center_info = '<option value="">None </option>';
if(mysqli_num_rows($result)>0)
{
    while($rows=mysqli_fetch_assoc($result))
    {
        $center_id=$rows['center_id'];
        $center_name=$rows['center_name'];
        $center_info .="<option value=$center_id> $center_name </option>";
    }
}

$sql = "SELECT cluster_id, cluster_name from clusters";
$result = mysqli_query($connect,$sql);
$cluster_info = '<option value="">None </option>';
if(mysqli_num_rows($result)>0)
{
    while($rows=mysqli_fetch_assoc($result))
    {
        $cluster_id=$rows['cluster_id'];
        $cluster_name=$rows['cluster_name'];
        $cluster_info .="<option value=$cluster_id> $cluster_name </option>";
    }
}

$sql = "SELECT base_id, base_name from bases";
$result = mysqli_query($connect,$sql);
$base_info = '<option value="">None </option>';
if(mysqli_num_rows($result)>0)
{
    while($rows=mysqli_fetch_assoc($result))
    {
        $base_id=$rows['base_id'];
        $base_name=$rows['base_name'];
        $base_info .="<option value=$base_id> $base_name </option>";
    }
}

if(isset($_POST["submit"]))
    
{
    
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $application = mysqli_real_escape_string($connect, $data[0]);  
    $user_name = mysqli_real_escape_string($connect, $data[1]);
    $start_time = mysqli_real_escape_string($connect, $data[2]);
    $end_time = mysqli_real_escape_string($connect, $data[3]);
    $Total_system_hours = mysqli_real_escape_string($connect, $data[4]);
    $clusters_cluster_id = mysqli_real_escape_string($connect, $_POST["cluster_id"]);
    $centers_center_id = mysqli_real_escape_string($connect, $_POST["center_id"]);;
    $bases_base_id = mysqli_real_escape_string($connect, $_POST["base_id"]);
                $query = "INSERT into monitored_info"
                        . "(user_name, application, start_time, end_time,Total_system_hours,clusters_cluster_id,centers_center_id,bases_base_id) "
                        . "values('$user_name','$application','$start_time','$end_time','$Total_system_hours','$cluster_id','$center_id','$base_id')";
                mysqli_query($connect, $query);
   }
   fclose($handle);
   echo "<script>alert('Import done');</script>";
  }
 }
}
?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>CSV</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        
 </head>  
 <body>  
     
     <div class="details">
         <img src="avatar.png" class="avatar">
  <h2 align="center">Please fill the Information Below</h2><br />
  <form method="post" enctype="multipart/form-data"action="Report1General.php">
        
       <h2><bold><label>Cluster Name</label>
               <select name="cluster_id" value="<?php echo $cluster_id?>">
           <?php  echo $cluster_info;?>
       </select></bold></h2>
       <br>
       </br>
         
      
    <h2><bold><input type="submit" name="submit" value="Generate Report" class="btn btn-info" /><h2></bold>
   </div>
       
  </form>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </body>  
</html>
              
                    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>Copyright &copy; 2019 <a href="http://softtech.aliveer.net">KinsleyInc</a>.</strong> All rights
        reserved.
    </footer>
    

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../../plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard2.js"></script>
<script src="filter.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
   $('#mydata').dataTable();
</script>
</body>
</html>
