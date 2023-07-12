<?php

    include('../connect.php');
    include('../functions.php');

    $title = postRequest('title');
    $content = postRequest('content');
    $userId = postRequest('user_id');

    $stmt = $connect->prepare("INSERT INTO `notes` (`note_title`,`note_content`,`note_user`) VALUES (?,?,?)");
    $stmt->execute(array($title,$content,$userId));

    $count=$stmt->rowCount();

    if($count >0){
        echo json_encode(array('status'=>'success'));

    }else{

        echo json_encode(array('status'=>'failed'));
    }

?>