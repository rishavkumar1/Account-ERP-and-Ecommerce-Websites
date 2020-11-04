<?php
session_start();
$message = false;
if (isset($_POST['done']) && isset($_SESSION['username'])) {
  $conn= mysqli_connect("localhost","root","","user_database");
  if($conn === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  $name_purpose = $_POST['purpose_name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $address = $_POST['address'];
  $purpose = $_POST['purpose'];
  $objective = $_POST['objective'];
  $dir_name = $_POST['dir_name'];
  $dir_din = $_POST['dir_din'];
  $dir_email = $_POST['dir_email'];
  $dir_mobile = $_POST['dir_mobile'];
  $particular = $_POST['particular'];
  $nshares = $_POST['nshares'];
  $share_amount = $_POST['share_amount'];
  $total = $_POST['total'];
  $emailID = $_SESSION['username'];
  $sql = "select * from users where email='$emailID'";
  $find =$conn->query($sql);
  $upd= "UPDATE users SET Company_purpose_name = '$name_purpose', Company_email = '$email',
  Company_purpose = '$purpose', Company_mobile = '$mobile', Company_address = '$address', Company_objective ='$objective',
  Company_dir_name ='$dir_name', Company_dir_din = '$dir_din', Company_dir_email = '$dir_email', Company_dir_mobile='$dir_mobile',
  Company_particular='$particular', Company_nshares = '$nshares', Company_share_amount='$share_amount',
  Company_total= '$total' WHERE email ='$emailID'";
  if (mysqli_query($conn, $upd)) {
    header("Location: quotation.php");
  }
  else{
    $message = "Error in uploading the information";
  }
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title> Company Registration Details Page</title>
  <link rel="stylesheet" type="text/css" href="format.css" media="screen"/>
</head>
<body>
<?php echo $message; ?>
  <form method='post'  action="company_registration_details.php" enctype="multipart/form-data">
    <p> <label for="01">Purpose Name of Company: </label>
    <input type="text" name="purpose_name" id="01" size="40" required></p>
    <p> <label for="02">Email ID: </label>
    <input type="email" id="02" name="email" size="40" required></p>
    <p> <label for="03">Mobile Number: </label>
    <input type="number" name="mobile" id="03" size="40" pattern="[0-9]{10}" required></p>
    <p> Register Address:</br>
    <textarea name="address" rows="10" cols="30" required>Enter your address here.</textarea></p>
    <p> Detail of Purpose:</br>
    <textarea name="purpose" rows="10" cols="30">Enter your purpose here.</textarea></p>
    <p> What are the objective of company?</br>
    <textarea name="objective" rows="10" cols="30">Enter objective of company here.</textarea></p>
    <p>Details of Director/shareholder:</p>
    <p>
      <label for="04">Name: </label>
      <input type="text" id="04" name="dir_name" size="40" required><br>
      <label for="05">DIN: </label>
      <input type="text" id="05" name="dir_din" size="40" required><br>
      <label for="06">email: </label>
      <input type="email" id="06" name="dir_email" size="40" required><br>
      <label for="07">Mobile: </label>
      <input type="number" id="07" name="dir_mobile" size="40" pattern="[0-9]{10}" required><br>
    </p>
    <p>Details of Authorized or Paid Capital:</p>
    <p>
      <label for="08">Particular: </label>
      <input type="text" id="08" name="particular" size="40" required><br>
      <label for="09">Number of shares: </label>
      <input type="text" id="09" name="nshares" size="40" required><br>
      <label for="10">Amount per share: </label>
      <input type="text" id="10" name="share_amount" size="40" required><br>
      <label for="11">Total: </label>
      <input type="text" id="11" name="total" size="40" required><br>
    </p>
    <p><input type="submit" name="done" value="Next">
      <input type="button" onclick="location.href='index.php'; return false;" value="Cancel">
    </p>
  </form>
</body>
