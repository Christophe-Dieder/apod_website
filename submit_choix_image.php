<?php
session_start();
include_once(__DIR__ . '/functions.php');

$postData = $_POST;

if(isset($postData)){
    $_SESSION['choix'] = $postData['date'];
}
redirectToUrl('profil.php');
?>