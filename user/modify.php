<?php
include '../includes/connexion.php';
session_start();

$new_name=$_POST["new_name"]; 
$new_avatar=$_POST["avatar"];
$password=$_POST["password"];

try{
    $statement = $pdo->prepare('SELECT * FROM users WHERE email=?');

    $statement->execute([$_SESSION['email']]);

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if(password_verify($password, $user['password'])){

        if(!empty($new_name)){
        
            
            try{
                $statement = $pdo->prepare('UPDATE users SET name =? WHERE users.email =?');
        
                $statement->execute([$new_name, $_SESSION["email"]]);
        
                $_SESSION['name']=$new_name; 
        
                
            }
            catch(PDOException $error){
                 echo  'ERROR: '.$error->getMessage();
            }


        }
            switch ($_FILES['avatar']['type']) {
                case 'image/gif':
                    $ext = 'gif';
                break;
                case 'image/jpeg':
                    $ext = 'jpg';
                break;
                case 'image/png':
                    $ext = 'png';
                break;
                // Si ce n'est aucun des 3 précédents, alors je le défini en "forbidden"
                default: 
                    $ext = "forbidden";
            }
            
            // Si mon extension est différente de "forbidden", je passe à l'étape du déplacement vers mon site.
            if($ext != 'forbidden')
            {
                // Le fichier source (celui téléchargé) se trouve actuellement dans le dossier temporaire du serveur
                $origin = $_FILES['avatar']['tmp_name'];
            
                // Je créé le nom du fichier
                // On veut un format correspondant à : adresseEmail_avatar.ext
                // On récupère donc l'adresse email de l'internaute (dans la $_POST)
                $filename = $_SESSION['email'].'_avatar.'.$ext;
            
                // Je créé le chemin de destination (là où je vais placer mon fichier dans mon site) à l'aide du dossier prévu et du nom créé
                $destination = 'images/'.$filename;
            
                // Pour déplacer le fichier dans un dossier, il faut vérifier avant si ce dernier existe, sinon on risque une erreur (et il en sera de même pour chaque éventuel sous-dossier !)
                if(!file_exists('images/')) {
                    // Si le dossier n'existe pas, alors on le créée.
                    mkdir('images/', 0777);
                }
            
                // A cette étape, soit le dossier existait déjà, soit il vient d'être créé.
                // Dans tous les cas, je peux désormais y placer mon fichier.
                move_uploaded_file($origin, $destination);

                $_SESSION['avatar']=$filename;
            
        }

        header("location: ../index.php");
        exit();
        
    }else{
        header('location:modify.tpl.php?error=Mot de passe erroné');

        exit();
   }
    
        
    
}
catch(PDOException $error){
   echo 'ERROR: '.$error->getMessage();
}



