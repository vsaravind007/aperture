<?php
include('CONFIG.php');
$mysqli = new mysqli(dbHost,dbUser,dbPass,dbName);
  if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      }
       if (!$stmt = $mysqli->query("SELECT * FROM aperture")) {
               echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
           }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aperture Album | Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">A</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Aperture Admin</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="upload.php">
                <i class="fa fa-files-o"></i>
                <span>Upload</span>
              </a>
            </li>
            <li class="active">
              <a href="list.php">
                <i class="fa fa-th"></i> <span>Current List</span>
              </a>
            </li>
            <li class="treeview">
              <a href="settings.php">
                <i class="fa fa-pie-chart"></i>
                <span>Settings</span>
              </a>
            </li>
                <li>
                           <a href="logout.php">
                           <i class="fa fa-user"></i>
                           <span>Logout</span>
                           </a>
                         </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Photo List
            <small>Upload your photos from here</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->

            <div class="box-body">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Date Uploaded</th>
                      <th>Action</th>
                    </tr>
                       <?php
                                     while ($row = mysqli_fetch_array($stmt)) {
                                         echo "<tr>";
                                         echo "<td>".$row['id']."</td>";
                                         echo "<td>".$row['title']."</td>";
                                         echo "<td>".$row['description']."</td>";
                                         echo "<td>".$row['dateuploaded']."</td>";
                                         echo "<td><button id=\"delete_btn\" class=\"btn btn-danger\"  data-value=".$row['id']. "  >Delete Image</button></td>";
                                         echo "</tr>";
                                     }

                   ?>

                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>

            </div><!-- /.box-body -->


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 0.1
        </div>
        <strong>Crafted with <span style="color:#C1095C;" class="fa fa-heart"></span> by <a href="http://aravindvs.com">Aravind</a>.</strong>
      </footer>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->

    <script type="text/javascript">
var abc = 0; //Declaring and defining global increement variable

$(document).ready(function() {
    $('.btn').click(function() {
     $.ajax({
       url: 'delete_core.php',
       method: 'POST',
       data: { id: $(this).data("value") },
       success: function (r){
         if(r)
          alert('File Deleted Successfully');
          else
           alert('Failed to delete file');
           window.location = 'list.php';
        }
      });
   });

   });

    </script>
  </body>
</html>
