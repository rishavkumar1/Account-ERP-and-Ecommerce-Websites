<?php
session_start();
$message = false;
if (isset($_POST['done']) && isset($_SESSION['username'])) {
  $conn= mysqli_connect("localhost","root","","user_database");
  if($conn === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  $name_purpose = $_POST['purpose_name'];
  $company_type = $_POST['ctype'];
  $purpose = $_POST['purpose'];
  $paid_capital = $_POST['pc'];
  $authorized_capital = $_POST['ac'];
  $address = $_POST['address'];
  $filename = $_FILES['address_file']['name'];
  $file = $_FILES['address_file']['tmp_name'];
  $destination = 'company_registration_files/address_proofs/' . $filename;
  $emailID = $_SESSION['username'];
  $sql = "select * from users where email='$emailID'";
  $find =$conn->query($sql);
  move_uploaded_file($file, $destination);
  $upd= "UPDATE users SET Purpose_name = '$name_purpose', Company_type = '$company_type',
  Purpose = '$purpose', Paid_capital = '$paid_capital', Authorized_capital = '$authorized_capital',
  Address ='$address', Address_file_name = '$filename' WHERE email ='$emailID'";
  if (mysqli_query($conn, $upd)) {
    header("Location: company_other.php");
  }
  else{
    $message = "Error in uploading the information";
  }
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title> Company Registration Page</title>
  <link rel="stylesheet" type="text/css" href="format.css" media="screen"/>
</head>
<body>
<?php echo $message; ?>
  <form method='post'  action="company_registration.php" enctype="multipart/form-data">
    <p> <label for="01">Name of Purpose of Company: </label>
    <input type="text" name="purpose_name" id="01" size="40" required></p>
    <p> <label for="02">Company Type: </label>
    <input type="text" name="ctype" id="02" size="40"  required></p>
    <p> Purpose:
    <textarea name="purpose" rows="10" cols="30">Enter your purpose here.</textarea></p>
    <p> <label for="03">Paid Capital: </label>
    <input type="text" name="pc" id="03" size="40" required></p>
    <p> <label for="04">Authorized Capital: </label>
    <input type="text" name="ac" id="04" size="40" required></p>
    <p> <input type="checkbox" id="05" name="reserve" value="yes" required>
    <span style="margin-left: -100px"> Reserve your name to fill form</span></p>
    <p> Register Address:
    <textarea name="address" rows="10" cols="30" required>Enter your address here.</textarea></p>
    <p> <label for="06">Upload Address Proof: </label>
    <input type="file" id="06" name="address_file" required></p>
    <p><input type="submit" name="done" value="Next">
      <input type="button" class="button" onclick="location.href='index.php';" value="Cancel">
    </p>
  </form>
</body>
