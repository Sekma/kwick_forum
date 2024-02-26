<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètre</title>
    <link rel="stylesheet" href="../css/accueil.css">
</head>
<body>

    <!-- header -->
    <header>
    <dialog style="margin: auto;" class="did" id="did">
        <p>Voulez-vous vraiment Déconnecter?</p>
        <button class="btnDialog" onclick="did.close()">Non</button>
        <button class="btnDialog"><a href="user/logout.php">Oui</a></button>
    </dialog>
    <h1 class="title">Welcome <span id="name"><?php echo ucfirst($_SESSION['name']) ?></span></h1>
            <nav>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="boutique/boutique.php">Boutique</a></li>
                    <li><a href="user/modify.tpl.php">Paramètre</a></li>
                    <li><a onclick='did.showModal()'>Deconnexion</a></li>
                </ul>
                <a href="boutique/pannier.php"><img src="../img/pannier.png" class="logo"></a>
            </nav>
            
        
        </header>
        <main>
            <section>
                <img src='../user/images/<?php echo $_SESSION['avatar'] ?>' alt='<?php echo $_SESSION['avatar'] ?>' width="150px">
                <p>Nom d'utilisateur: <strong><?php echo $_SESSION['name']; ?></strong></p>
                <p>E-mail: <strong><?php echo $_SESSION['email']; ?></strong></p>
                <p>Sexe: <strong><?php echo $_SESSION['genre']; ?></strong></p>
                <p>Age: <strong><?php echo $_SESSION['age']; ?></strong></p>
            </section>
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