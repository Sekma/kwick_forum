<?php
include '../includes/connexion.php';



    //stoquer les valeurs de formulaire dans des variables

    // Nom
    $name=strtolower($_POST["name"]); 
    
    // date de naissance
    $birthday = $_POST["birth"];

    // Calculer l'age
    $today = date("Y-m-d");
    $diff = date_diff(date_create($birthday), date_create($today));
    //echo 'Votre age est '.$diff->format('%y');
    $result=$diff->format('%y');

    // vérifier s'il est (>=18)
    if($result>=18){
        $age=$diff->format('%y');
    }else{
        header('location:signup.tpl.php?error=votre age est moins de 18');

        exit();
    }
    

    // e-mail
    $email=$_POST["email"];

    // mot de passe et la vérification
    if($_POST["password"]===$_POST["confirmPassword"]){
        $password=password_hash($_POST["password"], PASSWORD_DEFAULT);
    }else{
        header('location:signup.tpl.php?error=vérifiez mot de passe');

        exit();
    }
   
    $genre=$_POST["genre"];
    
    //télécharger la photo de profil, et stoquer le nom du fichier dans un variable $filename
    
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
        $filename = $_POST['email'].'_avatar.'.$ext;
    
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
    
    }

    try{
        $statement = $pdo->prepare('SELECT * FROM users WHERE email=?');

        $statement->execute([$email]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);


        if($user){
            header('location:signup.tpl.php?error=E-mail non disponible');

            exit();
            
        }else{
            try{
                $statement = $pdo->prepare('INSERT INTO users(nom, birth, email, password, genre, file) VALUES(?,?,?,?,?,?)');
        
                $statement->execute([$name, $birthday,$email, $password, $genre,$filename]);


                $statement = $pdo->prepare('SELECT * FROM users WHERE email=?');

                $statement->execute([$email]);

                $user = $statement->fetch(PDO::FETCH_ASSOC);
                
                session_start();
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
                /* session_start();
        
                $_SESSION['name']=$name;
                $_SESSION['avatar']=$filename;
                $_SESSION['email']=$email;
                $_SESSION['genre']=$genre;
                $_SESSION['age']=$age; */
                header('location:../index.php');
        
                
            }
            catch(PDOException $error){
                 echo  'ERROR: '.$error->getMessage();
              // header('location:modify.tpl.php');
            }
        }
    }
    catch(PDOException $error){
       echo 'ERROR: '.$error->getMessage();
    }
    

    

