<?php
include 'includes/connexion.php';

try{
    $statement = $pdo->query('SELECT file, nom, say FROM users INNER JOIN talk ON users.id=talk.user_id;');

   // $statement->execute();

    $talk = $statement->fetchAll();

   /*   echo '<pre>';
    print_r($talk);
    echo '</pre>';  */

    
}
catch(PDOException $error){
   echo 'ERROR: '.$error->getMessage();
}