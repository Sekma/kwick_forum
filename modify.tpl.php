<?php
    include_once 'utils/redirect.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètre</title>
    <link rel="stylesheet" href="css/accueil.css">
</head>
<body>
    <!-- header -->
    <?php include 'views/header.php' ?>
    
        <main>
            <section style="text-align: center">
                <h2>Modifiez votre profil</h2>
                <p><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                <form action="modify.php" method="post" enctype="multipart/form-data">
                    <label for="new_name">Changez votre nom: <input name="new_name" type="text" placeholder="Ecrivez votre nom"></label><br><br>
                    <p>Changez votre photo de profil</p>
                    <input type="file" name="avatar"><br><br>
                    <label for="name">Password: <input name="password" type="password" placeholder="Entrez votre mot de passe" required></label><br><br>
                    <input type="submit" value="Changer">
                    <button><a href="../index.php">Annuler</a></button>
                </form>
            </section>
        </main>
</body>

</html>