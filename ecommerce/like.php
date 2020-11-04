<?php
require_once "pdo.php";
$stmt = $pdo->prepare('SELECT * FROM wishlist  WHERE item_id=:id AND user_id = :uid');
$stmt->execute(array(':id' => $_POST['item_id'], ':uid'=> $_POST['user_id']));
$row= $stmt-> fetch(PDO::FETCH_ASSOC);
if($row==false)
{
  $stmt = $pdo->prepare('INSERT INTO wishlist (item_id,user_id) VALUES
   (:iid,:uid)');
   $stmt->execute(array(':iid' => $_POST['item_id'],
                        ':uid'=> $_POST['user_id']));
}
 ?>
