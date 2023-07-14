<?php


    include('../connect.php');
    include('../functions.php');

    $note_id    = postRequest('note_id');
    $image_name = postRequest('image_name');

    $stmt =  $connect->prepare("DELETE FROM `notes` WHERE `note_id`=?");
    $stmt->execute(array($note_id));

    $count = $stmt->rowCount();

    if($count>0){
        deleteImage('../uploaded_images/',$image_name);
        echo json_encode(array('status'=>'success'));
    }else{
        echo json_encode(array('status'=>'failed'));
    }
?>