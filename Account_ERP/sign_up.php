<?php
$message = false;
if (isset($_POST['emailID'])) {
  $email = $_POST['emailID'];
  $p1 = $_POST['pw1'];
  $p2 = $_POST['pw2'];
  $conn= mysqli_connect("localhost","root","","user_database");
  if($conn === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  $sql = "select * from users where email='$email'";
  $find =$conn->query($sql);
  $row = $find->fetch_assoc();
  if(($row!=false)){
    $message="Email already exists";
  }
  elseif ($p1==$p2){
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '".md5($p1)."')";
    if(mysqli_query($conn, $sql)){
        header('Location: login.php');
    } else{
        $message = "ERROR: Not able to execute query";
    }
  }
  else {
    $message="Passwords do not match";
  }
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title> Sign Up </title>
  <link rel="stylesheet" type="text/css" href="format.css" media="screen"/>
<body>
<?php echo $message; ?>
<form method='post'  action="sign_up.php">
  <p> <label for="01">Email: </label>
  <input type="email" name="emailID" id="01" size="40" required></p>
  <p> <label for="02">Password: </label>
  <input type="password" name="pw1" id="02" size="40"  required></p>
  <p> <label for="03">Confirm Password: </label>
  <input type="text" name="pw2" id="03" size="40" required></p>
  <p><input type="submit" name="done" value="Submit">
    <input type="button" onclick="location.href='login.php'; return false;" value="Cancel">
  </p>
</form>
</body>
</html>
