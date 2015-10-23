<?php
include('CONFIG.php');
$mysqli = new mysqli(dbHost,dbUser,dbPass,dbName);
if ($mysqli->connect_errno) {
 echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
 }
 if (!$settings = $mysqli->query("SELECT * FROM aperture_settings")) {
   echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
    }
 $row = mysqli_fetch_array($settings);

if (isset($_POST['submit']))
{
//$conn = new mysqli("localhost", "root", "", "test");
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$stmt = $mysqli->prepare("Update aperture_settings set websitetitle=?, subtitle=?, footer=?,facebook=?,twitter=?,instagram=?,github=?,email=? where 1");
$stmt->bind_param("ssssssss", $_POST['title'], $_POST['subtitle'], $_POST['footer'],$_POST['facebook'],$_POST['twitter'],$_POST['instagram'],$_POST['github'],$_POST['email']);
$stmt->execute();
$stmt->close();
$mysqli->close();
$result = "Settings Updated!";
header("Location: settings.php");
die();
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
        <a href="#" class="logo">
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
            <li>
              <a href="list.php">
                <i class="fa fa-th"></i> <span>Current List</span>
              </a>
            </li>
            <li class="treeview active">
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
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Settings
            <small>Website settings</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-body">
                <form role="form" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="title">Website Title</label>
                      <input type="text" class="form-control" value="<?php echo $row['websitetitle'];?>" id="title" name="title" placeholder="Website title you want to use, also shown in top right corner">
                    </div>
                    <div class="form-group">
                      <label for="subtitle">Subtitle</label>
                      <input type="text" class="form-control" id="subtitle" value="<?php echo $row['subtitle'];?>" name="subtitle" placeholder="Subtitle to be shown below your website title. Top right corner, below website title">
                    </div>
                  <div class="form-group">
                      <label for="footer">Footer Text</label>
                      <input type="text" class="form-control" id="footer" value="<?php echo $row['footer'];?>" name="footer" placeholder="Footer text/copyright">
                    </div>
                    <div class="form-group">
                                          <label for="facebook">Facebook</label>
                                          <input type="text" class="form-control" id="facebook" value="<?php echo $row['facebook'];?>" name="facebook" placeholder="Facebook Link">
                                        </div>
                                        <div class="form-group">
                                                              <label for="twitter">Twitter</label>
                                                              <input type="text" class="form-control" id="twitter" value="<?php echo $row['twitter'];?>" name="twitter" placeholder="Twiter Handle">
                                                            </div>
                                                            <div class="form-group">
                                                                                  <label for="instagram">Instagram</label>
                                                                                  <input type="text" class="form-control" id="instagram" value="<?php echo $row['instagram'];?>" name="instagram" placeholder="Instagram Profile">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                                      <label for="github">GitHub Link</label>
                                                                                                      <input type="text" class="form-control" id="github" value="<?php echo $row['github'];?>" name="github" placeholder="GitHub Profile">
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                     <label for="email">EMail</label>
                                                                                                     <input type="text" class="form-control" id="email" value="<?php echo $row['email'];?>" name="email" placeholder="Email To Show">
                                                                                                     </div>
                  </div>
                <?php
                  if(isset($result))
                   echo "<div>".$result."</div>";
                ?>
                  <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>


            </div><!-- /.box-body -->
          </div><!-- /.box -->

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
    <script type="text/javascript">
var abc = 0; //Declaring and defining global increement variable

$(document).ready(function() {

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
    $('#add_more').click(function() {
        $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
                $("<input/>", {name: 'file[]', type: 'file', id: 'file'}),
                $("<br/><br/>")
                ));
    });

//following function will executes on change event of file input to select different file
$('body').on('change', '#file', function(){


            if (this.files && this.files[0]) {
                 abc += 1; //increementing global variable by 1

				var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                console.log(abc);
                    var t =    '<div class="row">'+
                               '<div class="col-md-3">'+
                               '<div class="form-group">'+
                               '<label>Text</label>'+
                               '<input type="text" class="form-control" name="txt'+abc+'" placeholder="Enter ...">'+
                               '</div>'+
                               '<div class="form-group">'+
                               '<label>Textarea</label>'+
                               '<textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>'+
                               '</div>'+
                               '</div>'+
                               '</div>';

                $(this).before("<div id='abcd"+ abc +"' class='abcd box-body'><img id='previewimg" + abc + "' class=\"img-responsive pad\" src=''/></div>"+t);

			    var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);

			    $(this).hide();
                $("#abcd"+ abc).append($("<img/>", {id: 'img', src: 'x.png', alt: 'delete'}).click(function() {
                abc-=1;
                $(this).parent().parent().remove();
                }));
            }
        });

//To preview image
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
        var name = $(":file").val();
        if (!name)
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});
    </script>
  </body>
</html>
