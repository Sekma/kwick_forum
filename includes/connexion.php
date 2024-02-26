<?php

$url = 'mysql:host=localhost;port=3306;dbname=formulaire1';
$username = 'root';
$password = '';

try{
    $pdo = new PDO($url, $username, $password);
}
catch(PDOException $error){
    echo 'connection failed: '.$error->getMessage();
}