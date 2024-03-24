<?php
include '../includes/connexion.php';
session_start();

    $email=$_POST["email"];
    $password=$_POST["password"];
    //$password=password_hash($_POST["password"], PASSWORD_DEFAULT);

    try{
        $statement = $pdo->prepare('SELECT * FROM users WHERE email=?');

        $statement->execute([$email]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

       // print_r($user['mdp']);
        //echo gettype($user['mdp']);
        //echo password_hash($password, PASSWORD_DEFAULT);

        if($user){
          
            if(password_verify($password, $user['password'])){
                
                $_SESSION['name']=$user['nom'];
                $_SESSION['avatar']=$user['file'];
                $_SESSION['email']=$user['email'];
                $_SESSION['genre']=$user['genre'];
                $_SESSION['id']=$user['id'];

                $birthday=$user['birth'];
                // Calculer l'age
                    $today = date("Y-m-d");
                    $diff = date_diff(date_create($birthday), date_create($today));
                    //echo 'Votre age est '.$diff->format('%y');
                    $_SESSION['age']=$diff->format('%y');

                header('location:../index.php');

            }else{
                 header('location:login.tpl.php?error=Mot de passe erroné');

                 exit();
            }
        }else{
            header('location:login.tpl.php?error=Utilisateur non trouvé');

            exit();
        }
    }
    catch(PDOException $error){
       echo 'ERROR: '.$error->getMessage();
    }