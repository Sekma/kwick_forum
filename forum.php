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
            <h2>Forum</h2>


            <h2>Créer un nouveau sujet</h2> 
            <form action="subject.php" method="post" enctype="multipart/form-data">
                <label for="title">Titre de sujet: <input name="title" type="text" required></label><br><br>
                <label for="description">Description: <textarea name="description" id="" cols="60" rows="5"></textarea></label><br><br>
                <input type="submit" value="Créer">
            </form>



          
               
        </section>
    </main>
</body>

</html>