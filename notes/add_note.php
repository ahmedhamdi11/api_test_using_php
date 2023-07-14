<?php

    include('../connect.php');
    include('../functions.php');

    $title      = postRequest('title');
    $content    = postRequest('content');
    $userId     = postRequest('user_id');
    $note_image = postRequest('note_image');

    if(isset($_FILES['image'])){
        $note_image = uploadImage('image');
    }

    if($note_image !='faild to upload'){
        $stmt = $connect->prepare("
        INSERT INTO `notes` 
        (`note_title`,`note_content`,`note_image`,`note_user`)
        VALUES (?,?,?,?)
        ");
        $stmt->execute(array( $title, $content, $note_image, $userId ));

        $count=$stmt->rowCount();

        if($count >0){
            echo json_encode(array('status'=>'success'));

        }else{

            echo json_encode(array('status'=>'failed'));
        }
    }else{
        echo json_encode(array('status'=>'failed', 'message'=>'faild to upload image'));
    }

?>