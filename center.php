
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CL MONITOR </title>
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

    <![endif]-->
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
        <a href="index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>CL_</b>MONOTOR</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">

                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">

                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                   
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/img_avatar2.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Administrator<?php // while($row = mysqli_fetch_array($fromuser2)){?><?php //echo ucfirst($row['jina']); ?><?php //}?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">

                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">

                <li>
                    <a href="dashboard.php">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                
                <li>
                    <a href="general_report.php" data-toggle="modal" data-target="#profit">
                        <i class="fa fa-bar-chart"></i> <span>General Report</span>
                    </a>
                </li>
                <li>
                    <a href="app_use_frequency.php">
                        <i class="fa fa-database"></i> <span>Monthly App Use Frequency</span>
                        <span class="pull-right-container">
                         <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                
                
                <li>
                    <a href="monthly.php">
                        <i class="fa fa-database"></i> <span>Monthly/Weekly App Use Report</span>
                        <span class="pull-right-container">
                         <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                
                <li>
                    <a href="total_app_use_per_user.php">
                        <i class="fa fa-database"></i> <span>Total App Access Per User (Week)</span>
                        <span class="pull-right-container">
                         <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                
                
                <li>
                    <a href="daily_application.php">
                        <i class="fa fa-database"></i> <span>App Access Per User (Day)</span>
                        <span class="pull-right-container">
                         <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                
                <li>
                    <a href="daily_user_log.php">
                        <i class="fa fa-database"></i> <span>View Daily User Log</span>
                        <span class="pull-right-container">
                         <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                
                 <li>
                     <a href="base.php">
                        <i class="fa fa-database"></i> <span>Bases</span>
                        <span class="pull-right-container">
                         <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                
                 <li>
                     <a href="cluster.php">
                        <i class="fa fa-database"></i> <span>Clusters</span>
                        <span class="pull-right-container">
                         <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                
                 <li>
                     <a href="center.php">
                        <i class="fa fa-database"></i> <span>Centers</span>
                        <span class="pull-right-container">
                         <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                
                
                
                <li class="treeview">
                    <a href="infographic.php">
                        <i class="fa fa-pie-chart"></i>
                        <span> Info Graphic </span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>                
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Report </span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
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
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
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
                            <a href="general_report.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#addstock">Total No. of Unique Logins, Application Access & Hours of App Use</a>
                            <a href="monthly.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#update">Total No. of Unique Logins, Application Access & Hours of App Use per Month/Week</a><br></br>
                            <a href="app_use_frequency.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#addstock">Total Monthly App Use Frequency</a>
                            <a href="total_app_use_per_user.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#update">Total Number of Application Access Per User</a>
                            <a href="daily_application.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#update">Total Number of Application Access Per User</a>
                            <a href="daily_user_log.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#update">Daily User Log</a><br></br>
                            <a href="search.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#update">Search by Name</a>
                            <a href="search_date.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#update">Search by Date</a>
                          <!--  <a href="base.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#update">Bases</a>
                            <a href="cluster.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#update">Clusters</a>
                            <a href="center.php" class="btn btn-success  tooltop" role="button" data-toggle="modal" data-target="#update">Centers</a>-->
                            <a href="graph.php" class="btn btn-success  tooltop" role="button">Info-Graphics</a>
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
                        <!--table start-->
                        <div class="box-body">
                            <div class="table-responsive">
                                    <?php
                                    $query =mysqli_query($dbconfig,"SELECT center_id as center_id, center_name as center_name from centers");
                                    ?>
                                <table id="mydata" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>CENTER ID</th>
                                            <th>CENTER NAME</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        //print 10 item
                                                                         
          

            

          while($row2 = mysqli_fetch_array($query))
                                        {
         
             ?>

                                    <tr>
                                       
                                        <td> <?php echo $row2['center_id'];?></td>
                                        <td><?php echo $row2['center_name'];?></td>
                                    </tr>

                                   <?php }
                                    ?>
                                    </tbody>
                                </table>
                                <br>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 
        </div>
    </div>


    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>Copyright &copy; 2017 <a href="http://softtech.aliveer.net">KinsleyInc</a>.</strong> All rights
        reserved.
    </footer>
</div>
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
