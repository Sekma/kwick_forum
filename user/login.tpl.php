<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identification</title>
</head>
<body style="width: 500px; padding: 50px; margin: auto;">
    <h1>Login</h1>
    <p><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
    <form action="login.php" method="Post">
        <label for="email">Email: <input name="email" type="email" required></label><br><br>
        <label for="password">Mot de passe: <input name="password" type="password" required></label><br><br>
        <input type="submit">

    </form>
    <a href="signup.tpl.php">S'inscrire</a>
</body>
</html>