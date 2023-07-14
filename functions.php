<?php
  
  define('MB', 1048576);
  
  // post request
  function postRequest($requestName){
    return htmlspecialchars(strip_tags($_POST[$requestName]));
  }
  
  // upload image fn
  function uploadImage($imageRequest){

    $imageName = rand(0,10000).$_FILES[$imageRequest]['name'];
    $imageTmp = $_FILES[$imageRequest]['tmp_name'];
    $imageSize = $_FILES[$imageRequest]['size'];

    $allowedExtentions =array('jpg', 'png' ,'gif');
    
    $strToArray =explode('.', $imageName);
    $imageExtention =end($strToArray);
    $imageExtention=strtolower($imageExtention);

    global $errMessage;

    if(!empty($imageName) && ! in_array($imageExtention ,$allowedExtentions)){
      $errMessage[] = 'extention not allowed, only jpg, png, and gif is alowed extentions';
    }

    if($imageSize > 2 * MB){
      $errMessage[] = 'image size is too big, alowed max size 2MB';
    }

    if(empty($errMessage)){
      move_uploaded_file( $imageTmp , '../uploaded_images/'.$imageName );
      return $imageName;
    }else{
      return 'faild to upload' ;
    }

  }

  //delete image fn
  function deleteImage($dir, $imageName){
    $imagePath = $dir.$imageName;
    
    if(file_exists($imagePath)){
      unlink($imagePath);
    }
  }

?>