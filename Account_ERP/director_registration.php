<?php
session_start();
$message = false;
if (isset($_POST['done']) && isset($_SESSION['username'])) {
  $conn= mysqli_connect("localhost","root","","user_database");
  if($conn === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  $name_director = $_POST['director_name'];
  $date_of_birth = $_POST['dob'];
  $mobile_number = $_POST['mobile'];
  $share_pattern = $_POST['sp'];
  $education = $_POST['edu'];
  $din_number = $_POST['din'];
  $gen = $_POST['gender'];
  $director_email = $_POST['email'];
  $pan_number = $_POST['pan'];
  $occup = $_POST['occup'];
  $emailID = $_SESSION['username'];
  $upd= "UPDATE users SET Director_name = '$name_director', Date_of_Birth = '$date_of_birth',
  Director_mobile = '$mobile_number', Share_pattern = '$share_pattern', Education = '$education',
  DIN_number ='$din_number', Gender = '$gen', Director_email = '$director_email', PAN_number='$pan_number',
  Occupation = '$occup' WHERE email ='$emailID'";
  if (mysqli_query($conn, $upd)) {
    header("Location: director_file_upload.php");
  }
  else{
    $message = "Error in uploading the information";
  }
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title> Director Registration Page</title>
  <link rel="stylesheet" type="text/css" href="format.css" media="screen"/>
</head>
<body>
<?php echo $message; ?>
  <form method='post'  action="director_registration.php" enctype="multipart/form-data">
    <p> <label for="01">Name: </label>
    <input type="text" name="director_name" id="01" size="40" required></p>
    <p> <label for="02">Date of Birth: </label>
    <input type="text" name="dob" id="02" size="40"  required></p>
    <p> <label for="03">Mobile Number: </label>
    <input type="number" name="mobile" id="03" size="40" pattern="[0-9]{10}"required></p>
    <p> <label for="04">Share Pattern: </label>
    <input type="text" name="sp" id="04" size="40" required></p>
    <p> <label for="05">Education:</label>
      <input type="text" id="05" name="edu" size="40" required></p>
    <p> <label for="06">DIN Number: </label>
    <input type="text" id="06" name="din" size="40" required></p>
    <p> <label for="07">Gender: </label>
    <input type="text" id="07" name="gender" size="40" required></p>
    <p> <label for="08">Email ID: </label>
    <input type="email" id="08" name="email" size="40" required></p>
    <p> <label for="09">PAN Card Number: </label>
    <input type="text" id="09" name="pan" size="40" required></p>
    <p> <label for="10">Occupation: </label>
    <input type="text" id="10" name="occup" size="40" required></p>
    <p><input type="submit" name="done" value="Next">
      <input type="button" onclick="location.href='index.php'; return false;" value="Cancel">
    </p>
  </form>
</body>
