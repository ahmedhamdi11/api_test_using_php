<?php
  include('connect.php');


//   $insert=$connect->prepare("INSERT INTO `users` (`name` , `email` ) VALUES (' Hamdi', 'ahmedhamdi@gmail.com')");
//   $insert->execute();


//   $updat =$connect->prepare("UPDATE `users` SET `name` ='ahmed hamdi' WHERE id=5 ");
//   $updat->execute();

//   $delete =$connect->prepare("DELETE FROM `users` WHERE id=6");
//   $delete->execute();
  

  $stmt = $connect->prepare("SELECT * FROM users");
  $stmt->execute();
  $user =$stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($user);

?>