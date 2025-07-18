<?php

session_start();
// print_r($postData);
$apiKey = 'api_key=DEMO_KEY';
if(isset($_SESSION['choix'])){
$apiUrl = "https://api.nasa.gov/planetary/apod?{$apiKey}&date={$_SESSION['choix']}";
}
else{$apiUrl = "https://api.nasa.gov/planetary/apod?{$apiKey}";}
$response = file_get_contents($apiUrl);

echo $response;
?>