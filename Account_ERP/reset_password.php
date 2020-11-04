<?php
$message= false;
if (isset($_POST['emailID']) && isset($_POST['old'])) {
  $email = $_POST['emailID'];
  $np1 = $_POST['new1'];
  $np2 = $_POST['new2'];
  $op = $_POST['old'];
  $conn= mysqli_connect("localhost","root","","user_database");
  if($conn === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  $sql = "select * from users where email='$email' && password = '".md5($op)."'";
  $find =$conn->query($sql);
  $row = $find->fetch_assoc();
  if(($row!=false)&&($row['email']== $email) && ($row['password']== md5($op))){
    if($np1==$np2){
      $upd = "UPDATE users SET password='".md5($np1)."' WHERE email='$email'";
      if (mysqli_query($conn, $upd)) {
        header("Location: login.php");
      } else {
        $message= "Error in updating the password";
      }
    }
    else{
      $message = "New passwords do not match";
    }
  }
  else {
      $message = "Incorrect Username or Password";
  }
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title> Reset Password</title>
  <link rel="stylesheet" type="text/css" href="format.css" media="screen"/>
</head>
<body>
  <?php echo $message; ?>
<form method='post' action="reset_password.php" >
  <p> <label for="01">Email: </label>
  <input type="email" name="emailID" id="01" size="40" required></p>
  <p> <label for="02">Password: </label>
  <input type="password" name="old" id="02" size="40" required></p>
  <p> <label for="03">New Password: </label>
  <input type="password" name="new1" id="03" size="40" required></p>
  <p> <label for="04">Confirm New Password: </label>
  <input type="text" name="new2" id="04" size="40" required></p>
  <p><input type="submit" name="done" value="Submit">
    <input type="button" onclick="location.href='login.php'; return false;" value="Cancel">
  </p>
</form>
</body>
</html>
