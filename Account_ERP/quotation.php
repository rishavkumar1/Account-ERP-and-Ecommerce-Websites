<?php
session_start();
$message = false;
if (isset($_POST['done']) && isset($_SESSION['username'])) {
  $conn= mysqli_connect("localhost","root","","user_database");
  if($conn === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  $name_company = $_POST['company_name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $address = $_POST['address'];
  $purpose = $_POST['purpose'];
  $qno = $_POST['qno'];
  $expiry = $_POST['expiry'];
  $name = $_POST['name'];
  $print = $_POST['print'];
  $quantity = $_POST['quantity'];
  $total = $_POST['total'];
  $emailID = $_SESSION['username'];
  $sql = "select * from users where email='$emailID'";
  $find =$conn->query($sql);
  $upd= "UPDATE users SET Quotation_company_name = '$name_company', Quotation_email = '$email',
  Quotation_purpose = '$purpose', Quotation_mobile = '$mobile', Quotation_address = '$address',
  Quotation_number ='$qno', Date_expiry = '$expiry', Quotation_description = '$name',
  print='$print', Quantity = '$quantity', Quotation_total = '$total' WHERE email ='$emailID'";
  if (mysqli_query($conn, $upd)) {
    header("Location: finish.php");
  }
  else{
    $message = "Error in uploading the information";
  }
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title> Quotation Page</title>
  <link rel="stylesheet" type="text/css" href="format.css" media="screen"/>
</head>
<body>
<?php echo $message; ?>
  <form method='post'  action="quotation.php" enctype="multipart/form-data">
    <p> <label for="01">Company Name: </label>
    <input type="text" name="company_name" id="01" size="40" required></p>
    <p> Register Address:</br>
    <textarea name="address" rows="10" cols="30" required>Enter your address here.</textarea></p>
    <p> <label for="02">Phone Number: </label>
    <input type="number" name="mobile" id="02" size="40" pattern="[0-9]{10}" required></p>
    <p> <label for="03">Email ID: </label>
    <input type="email" id="03" name="email" size="40" required></p>
    <p> Purpose:</br>
    <textarea name="purpose" rows="10" cols="30">Enter your purpose here.</textarea></p>
    <p><label for="04">Quotation Number: </label>
    <input type="text" id="04" name="qno" size="40" required></p>
    <p><label for="05">Date Expiry: </label>
    <input type="text" id="05" name="expiry" size="40" required></p>
    <p><label for="06">Name/Description: </label>
    <input type="text" id="06" name="name" size="40" required></p>
    <p><label for="07">Print: </label>
    <input type="text" id="07" name="print" size="40" required></p>
    <p><label for="08">Quantity: </label>
    <input type="text" id="08" name="quantity" size="40" required></p>
    <p><label for="09">Total: </label>
    <input type="text" id="09" name="total" size="40" required></p>
    <p><input type="submit" name="done" value="Submit">
    <input type="button" onclick="location.href='index.php'; return false;" value="Cancel"></p>
  </form>
</body>
