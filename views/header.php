<header>
    <dialog style="margin: auto;" class="did" id="did">
        <p>Voulez-vous vraiment Déconnecter?</p>
        <button class="btnDialog" onclick="did.close()">Non</button>
        <button class="btnDialog"><a href="user/logout.php">Oui</a></button>
    </dialog>
    <h1 class="title">Welcome <span id="name"><?php echo ucfirst($_SESSION['name']) ?></span></h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="forum.php">Forum</a></li>
                    <li><a href="modify.tpl.php">Paramètre</a></li>
                    <li><a onclick='did.showModal()'>Deconnexion</a></li>
                </ul>
            </nav>
            <img src='user/images/<?php echo $_SESSION['avatar'] ?>' alt='<?php echo $_SESSION['avatar'] ?>' width="150px">
            <p>Nom d'utilisateur: <strong><?php echo $_SESSION['name']; ?></strong></p>
            <p>E-mail: <strong><?php echo $_SESSION['email']; ?></strong></p>
            <p>Sexe: <strong><?php echo $_SESSION['genre']; ?></strong></p>
            <p>Age: <strong><?php echo $_SESSION['age']; ?></strong></p>
</header>