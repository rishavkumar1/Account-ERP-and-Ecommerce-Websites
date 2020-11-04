<?php
$message= false;
session_start();
if(!isset($_SESSION['username']) || isset($_POST['logout'])){
  session_destroy();
  header('Location: login.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title> Company or Director Registration </title>
  <link rel="stylesheet" type="text/css" href="format.css" media="screen"/>

</head>
<body>
  <?php echo $message; ?>
  <form method='post'  action="index.php">
  <p> <input type="button" onclick="location.href='company_registration.php'; return false;" value="Company Registration"> </br>
  <input type="button" onclick="location.href='director_registration.php'; return false;" value="Director Registration"> </br>
  <input type="submit" name="logout" value="Logout"> </p>
</form>

</body>
