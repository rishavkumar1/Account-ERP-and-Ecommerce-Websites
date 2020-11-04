<?php
require_once("pdo.php");
$stmt = $pdo->prepare('DELETE from wishlist where user_id= :uid AND item_id = :iid');
$stmt->execute(array(':uid'=> $_POST['user_id'], ':iid' => $_POST['item_id']));
 ?>
