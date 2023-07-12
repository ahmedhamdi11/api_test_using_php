<?php


    include('../connect.php');
    include('../functions.php');

    $note_id =postRequest('note_id');
    $note_title =postRequest('note_title');
    $note_content =postRequest('note_content');

    $stmt =  $connect->prepare("UPDATE `notes` SET `note_title` =? , `note_content`=? WHERE `note_id`=?");
    $stmt->execute(array($note_title,$note_content,$note_id));

    $count = $stmt->rowCount();

    if($count>0){
        echo json_encode(array('status'=>'success'));
    }else{
        echo json_encode(array('status'=>'error','message'=>'faild to update'));
    }
?>