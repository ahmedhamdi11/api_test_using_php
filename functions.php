<?php
  
  function postRequest($requestName){
    return htmlspecialchars(strip_tags($_POST[$requestName]));
  }
?>