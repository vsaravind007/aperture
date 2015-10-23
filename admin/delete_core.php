<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$stmt = $conn->prepare("DELETE FROM aperture WHERE id = ?");
$stmt->bind_param('i', $_POST['id']);
if($stmt->execute())
 echo 'true';
else
 echo 'false';
$conn->close();
?>