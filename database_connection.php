<?php
try{
    $db = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);
    // echo "You've been connected ! ";
}catch(PDOException $e){
    $error_message = $e->getMessage();
    echo $error_message;
    exit();

}
?>
