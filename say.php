<?php
include 'includes/connexion.php';
session_start();
$comment=$_POST['comment'];
$user_id=$_SESSION['id'];
try{
    $statement = $pdo->prepare('INSERT INTO talk(user_id, say) VALUES(?,?)');

    $statement->execute([$user_id, $comment]);
    
    header('location:talk.tpl.php');
}
catch(PDOException $error){
     echo  'ERROR: '.$error->getMessage();
  // header('location:modify.tpl.php');
}