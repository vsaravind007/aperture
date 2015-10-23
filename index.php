<?php
include('admin/CONFIG.php');
$mysqli = new mysqli(dbHost,dbUser,dbPass,dbName);
  if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      }
       if (!$stmt = $mysqli->query("SELECT * from aperture_settings")) {
               echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
           }
           $row = mysqli_fetch_array($stmt);
  if (!$stmt2 = $mysqli->query("SELECT * from aperture")) {
               echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
           }

?>

<!DOCTYPE HTML>
<!--
    Aperture PHP Photo Album v 0.1
    www.aravindvs.com
-->
<html>
	<head>
		<title><?php echo $row['websitetitle']; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading-0 is-loading-1 is-loading-2">

		<!-- Main -->
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1><?php echo $row['websitetitle']; ?></h1>
						<p><?php echo $row['subtitle']; ?></p>
						<ul class="icons">
							<li><a href="http://twitter.com/<?php echo $row['twitter']; ?>" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="http://facebook.com/<?php echo $row['facebook']; ?>" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="http://instagram.com/<?php echo $row['instagram']; ?>" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="http://github.com/<?php echo $row['github']; ?>" class="icon fa-github"><span class="label">Github</span></a></li>
							<li><a href="mailto:<?php echo $row['email']; ?>" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
						</ul>
					</header>

				<!-- Thumbnail -->
					<section id="thumbnails">
					<?php
					 while($img = mysqli_fetch_array($stmt2))
					 {
					  echo "<article>\r\n";
					  echo "<a class=\"thumbnail\" href=\"admin/".$img['filename']."\""."><img src=\"admin/thumbs/".basename($img['filename'])."\"/></a>"."\r\n";
					  echo "<h2>".$img['title']."</h2>\r\n";
					  echo "<p>".$img['description']."</p>\r\n";
					  echo "</article>";
					  }
         ?>

					</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							<li><?php echo $row['footer']; ?></li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>