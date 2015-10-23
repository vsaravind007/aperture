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
        <a href="#" class="logo">
          <span class="logo-mini">A</span>
          <span class="logo-lg">Aperture Admin</span>
        </a>
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
            <li class="treeview active">
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
            Upload Photos
            <small>Upload your photos from here</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-body">
              Start creating your amazing album!
                <form enctype="multipart/form-data" action="" method="post">
                 First Field is Compulsory. Only JPEG,PNG,JPG Type Image Uploaded. Image Size Should Be <= <?php echo ini_get("upload_max_filesize"); ?>.
                 <hr/>
                 <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
                 <input type="button" id="add_more" class="btn bg-orange margin upload" value="Add More Files"/>
                 <input type="submit" value="Upload File(s)" name="submit" id="upload" class="btn bg-olive margin upload"/>
                </form>
            <?php include "upload_core.php"; ?>
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
                               '<label>Title</label>'+
                               '<input type="text" class="form-control" name="txt'+abc+'" required placeholder="Photo title">'+
                               '</div>'+
                               '<div class="form-group">'+
                               '<label>Description</label>'+
                               '<textarea class="form-control" rows="3" name="dsc'+abc+'" placeholder="Photo description"></textarea>'+
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
            alert("First Image Is Required");
            e.preventDefault();
        }
    });
});
    </script>
  </body>
</html>
