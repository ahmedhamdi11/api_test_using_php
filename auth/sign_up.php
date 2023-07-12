<?php
   
   include ("../connect.php");
   include("../functions.php");

    $email = postRequest('email');
    $password = postRequest('password');

    // Check if the email address already exists in the database
    $stmt = $connect->prepare("SELECT * FROM `users` WHERE `email` = ?");
    $stmt->execute(array($email));
    $count = $stmt->rowCount();

    if ($count > 0) {
        // Email address already exists, return an error message
        echo json_encode(array('status' => 'error', 'message' => 'email address already exists'));
    } else {
        // Email address is unique, insert the new user into the database
        $stmt = $connect->prepare("INSERT INTO `users` (`email`, `password`) VALUES (?, ?)");
        $stmt->execute(array($email, $password));
        $count = $stmt->rowCount();

        if ($count > 0) {
            // User registration successful
            echo json_encode(array('status' => 'success'));
        } else {
            // User registration failed
            echo json_encode(array('status' => 'error', 'message' => 'User registration failed.'));
        }
    }
?>

   