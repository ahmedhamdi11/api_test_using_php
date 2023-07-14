<?php


    include('../connect.php');
    include('../functions.php');

    $note_id =postRequest('note_id');
    $note_title =postRequest('note_title');
    $note_content =postRequest('note_content');
    $note_image =postRequest('note_image');
    
    if(isset($_FILES['image'])){
        deleteImage('../uploaded_images/',$note_image);
        $note_image =uploadImage('image');
    }

    $stmt =  $connect->prepare("UPDATE `notes` SET `note_title` =? , `note_content`=? ,`note_image`=? WHERE `note_id`=?");
    $stmt->execute(array($note_title, $note_content, $note_image, $note_id));

    $count = $stmt->rowCount();

    if($count>0){
        echo json_encode(array('status'=>'success'));
    }else{
        echo json_encode(array('status'=>'error','message'=>'faild to update'));
    }
?>