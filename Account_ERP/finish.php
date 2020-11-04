<html>
<head>
  <title> Finish Page </title>
  <link rel="stylesheet" type="text/css" href="format.css" media="screen"/>
</head>
<body>
<?php
echo 'You have completely filled and submitted files for registration sucessfully.';
echo "<br>";
echo 'This page will be redirected in few seconds.';
header('Refresh:8; url=index.php');
 ?>
</body>
</html>
