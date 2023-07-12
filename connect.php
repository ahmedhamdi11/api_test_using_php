
<?php 
$dsn = "mysql:host=localhost;dbname=notes_db" ; 
$user = "root" ;
$password = "" ; 
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8" // FOR Arabic
);
try {

    $connect = new PDO($dsn , $user , $password , $option ); 
    $connect->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION) ;
    


}catch(PDOException $e){
  echo $e->getMessage() ;        
}