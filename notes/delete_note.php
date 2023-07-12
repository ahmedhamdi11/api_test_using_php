<?php


    include('../connect.php');
    include('../functions.php');

    $note_id =postRequest('note_id');

    $stmt =  $connect->prepare("DELETE FROM `notes` WHERE `note_id`=?");
    $stmt->execute(array($note_id));

    $count = $stmt->rowCount();

    if($count>0){
        echo json_encode(array('status'=>'success'));
    }else{
        echo json_encode(array('status'=>'failed'));
    }
?>