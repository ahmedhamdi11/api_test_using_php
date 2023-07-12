<?php

    include('../connect.php');
    include('../functions.php');

   try{

    $userId =postRequest('user_id');

    $stmT= $connect->prepare("SELECT * FROM `notes` WHERE `note_user` =?");
    $stmT->execute(array($userId));
    $data=$stmT->fetchAll(PDO::FETCH_ASSOC);
    $count= $stmT->rowCount();

    echo json_encode(array('status'=>'success','data'=>$data));

   }catch(Exception $e){
    echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
   }

    


?>