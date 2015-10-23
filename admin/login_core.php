<?php

$name = "admin";
$pass = "pass";


if($_POST['username']==$name && $_POST['password']==$pass)
{
 session_start();
 $_SESSION['logged_in']='true';
 header('Location: list.php');
}
else
 header('Location: index.php');
?>