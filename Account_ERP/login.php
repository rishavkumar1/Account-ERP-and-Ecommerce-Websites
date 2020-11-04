<?php
  $message= false;
  if (isset($_POST['emailID']) && isset($_POST['pw'])) {
    $email = $_POST['emailID'];
    $p1 = $_POST['pw'];
    $conn= mysqli_connect("localhost","root","","user_database");
    if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $sql = "select * from users where email='$email' && password = '".md5($p1)."'";
    $find =$conn->query($sql);
    $row = $find->fetch_assoc();
    if(($row!=false)&&($row['email']== $email) && ($row['password']== md5($p1))){
      session_start();
      $_SESSION['username']=$email;
      header("Location: index.php");
      exit();
    }
    else {
        $message = "Incorrect Username or Password";
    }
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <title> User login </title>
  <link rel="stylesheet" type="text/css" href="format.css" media="screen"/>
</head>
<body>
<?php echo $message; ?>
<form method='post' action="login.php">
  <p> <label for="01">Email: </label>
  <input type="email" name="emailID" id="01" size="40" required></p>
  <p> <label for="02">Password: </label>
  <input type="password" name="pw" id="02" size="40" required></p>
  <p><input type="submit" name="done" value="Login">
    <input type="button" onclick="location.href='sign_up.php'; return false;" value="Sign Up">
    <input type="button" onclick="location.href='reset_password.php'; return false;" value="Reset Password">
  </p>
</form>
</body>
</html>
