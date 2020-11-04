<?php
session_start();
$message = false;
if (isset($_POST['done']) && isset($_SESSION['username'])) {
  $conn= mysqli_connect("localhost","root","","user_database");
  if($conn === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  $filename_pan = $_FILES['PAN']['name'];
  $file_pan = $_FILES['PAN']['tmp_name'];
  $dest_pan = 'director_registration_files/pan_proofs/' . $filename_pan;
  $filename_address = $_FILES['address']['name'];
  $file_address = $_FILES['address']['tmp_name'];
  $dest_address = 'director_registration_files/address_proofs/' . $filename_address;
  $filename_passport = $_FILES['passport']['name'];
  $file_passport = $_FILES['passport']['tmp_name'];
  $dest_passport = 'director_registration_files/passport_proofs/' . $filename_passport;
  $filename_driving = $_FILES['driving']['name'];
  $file_driving = $_FILES['driving']['tmp_name'];
  $dest_driving = 'director_registration_files/driving_license/' . $filename_driving;
  $filename_voting = $_FILES['voting']['name'];
  $file_voting = $_FILES['voting']['tmp_name'];
  $dest_voting = 'director_registration_files/voting_card/' . $filename_voting;
  $filename_bank = $_FILES['bank']['name'];
  $file_bank = $_FILES['bank']['tmp_name'];
  $dest_bank = 'director_registration_files/bank_statement/' . $filename_bank;
  $filename_light = $_FILES['light']['name'];
  $file_light = $_FILES['light']['tmp_name'];
  $dest_light = 'director_registration_files/light_bill/' . $filename_light;
  $filename_photo = $_FILES['photo']['name'];
  $file_photo = $_FILES['photo']['tmp_name'];
  $dest_photo = 'director_registration_files/passport_photo/' . $filename_photo;
  $filename_sign = $_FILES['sign']['name'];
  $file_sign = $_FILES['sign']['tmp_name'];
  $dest_sign = 'director_registration_files/director_sign/' . $filename_sign;
  $emailID = $_SESSION['username'];
  $sql = "select * from users where email='$emailID'";
  $find =$conn->query($sql);
  move_uploaded_file($file_pan, $dest_pan);
  move_uploaded_file($file_address, $dest_address);
  move_uploaded_file($file_passport, $dest_passport);
  move_uploaded_file($file_driving, $dest_driving);
  move_uploaded_file($file_voting, $dest_voting);
  move_uploaded_file($file_bank, $dest_bank);
  move_uploaded_file($file_light, $dest_light);
  move_uploaded_file($file_photo, $dest_photo);
  move_uploaded_file($file_sign, $dest_sign);
  $upd= "UPDATE users SET PAN = '$filename_pan', Director_address_file = '$filename_address',
  Passport = '$filename_passport', Driving_license = '$filename_driving', Voting_card = '$filename_voting',
  Bank_statement ='$filename_bank', Light_bill = '$filename_light', Photo = '$filename_photo', Director_sign = '$filename_sign'
  WHERE email ='$emailID'";
  if (mysqli_query($conn, $upd)) {
    header("Location: director_other.php");
  }
  else{
    $message = "Error in uploading the information";
  }
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title> Director File Upload Page</title>
  <link rel="stylesheet" type="text/css" href="format.css" media="screen"/>

</head>
<body>
<?php echo $message; ?>
  <form method='post'  action="director_file_upload.php" enctype="multipart/form-data">
    <p> <label for="01"> Upload PAN Card</label>
    <input type="file" id="01" name="PAN" required></p>
    <p> <label for="02"> Upload Address Proof</label>
    <input type="file" id="02" name="address" required></p>
    <p> <label for="03"> Upload Passport</label>
    <input type="file" id="03" name="passport" required></p>
    <p> <label for="04"> Upload Driving License</label>
    <input type="file" id="04" name="driving" required></p>
    <p> <label for="05"> Upload Voting Card</label>
    <input type="file" id="05" name="voting" required></p>
    <p> <label for="06"> Upload Bank Statement</label>
    <input type="file" id="06" name="bank" required></p>
    <p> <label for="07"> Upload Light Bill</label>
    <input type="file" id="07" name="light" required></p>
    <p> <label for="08"> Upload Passport Photo</label>
    <input type="file" id="08" name="photo" required></p>
    <p> <label for="09"> Upload Director Sign</label>
    <input type="file" id="09" name="sign" required></p>
    <p><input type="submit" name="done" value="Next">
      <input type="button" onclick="location.href='index.php'; return false;" value="Cancel">
    </p>
  </form>
</body>
