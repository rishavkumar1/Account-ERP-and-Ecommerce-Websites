<?php
session_start();
$message = false;
if (isset($_POST['done']) && isset($_SESSION['username'])) {
  $conn= mysqli_connect("localhost","root","","user_database");
  if($conn === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  $filename_other = $_FILES['other']['name'];
  $file_other = $_FILES['other']['tmp_name'];
  $dest_other = 'company_registration_files/other_files/' . $filename_other;
  $filename_noc = $_FILES['noc']['name'];
  $file_noc = $_FILES['noc']['tmp_name'];
  $dest_noc = 'company_registration_files/noc/' . $filename_noc;
  $emailID = $_SESSION['username'];
  move_uploaded_file($file_other, $dest_other);
  move_uploaded_file($file_noc, $dest_noc);
  $upd= "UPDATE users SET Company_other_file = '$filename_other', Company_noc = '$filename_noc'  WHERE email ='$emailID'";
  if (mysqli_query($conn, $upd)) {
    header("Location: company_registration_details.php");
  }
  else{
    $message = "Error in uploading the information";
  }
}
 ?>
<html>
<head>
  <title> Company Other Document Upload Page </title>
  <link rel="stylesheet" type="text/css" href="format.css" media="screen"/>
</head>
<body>
<?php echo $message; ?>
<form method='post'  action="company_other.php" enctype="multipart/form-data">
  <p> <label for="01"> Upload Other Document</label>
  <input type="file" id="01" name="other" required></p>
  <a href="company_registration_files/director_noc.docx">Download NOC</a>
  <p> <label for="02"> Upload NOC</label>
  <input type="file" id="02" name="noc" required></p>
  <p><input type="submit" name="done" value="Next">
  <input type="button" onclick="location.href='index.php'; return false;" value="Cancel">
</form>

</body>
