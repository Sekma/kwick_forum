
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body style="width: 500px; padding: 50px; margin: auto;">
    <h1>Inscription</h1>
    <p><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
    <form action="signup.php" method="post" enctype="multipart/form-data">
        <label for="name">Nom: <input name="name" type="text" placeholder="Entrez votre nom" required></label><br><br>
        <label for="birth">Né le: <input name="birth" type="date" id="birth" required></label><br><br>
        <label for="email">E-mail: <input name="email" type="email" placeholder="Entrez votre E-mail" required></label><br><br>
        <label for="password">Mot de passe: <input name="password" type="password" placeholder="Entrez votre mot de passe" required></label><br><br>
        <label for="confirmPassword">Vérification MP: <input name="confirmPassword" type="password" placeholder="Vérifiez votre mot de passe" required></label><br><br>

    <p>Votre sexe:</p>
        <label><input type="radio" name="genre" value="homme" required> Homme</label>
        <label><input type="radio" name="genre" value="femme" required> Femme</label><br><br>

    <p>Télechargez votre photo de profil</p>
    <input type="file" name="avatar"><br><br>
		
    <input type="submit">
    <a href="login.tpl.php">Se connecter</a>
  
</form>
</body>
<script>
    var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
   dd = '0' + dd;
}

if (mm < 10) {
   mm = '0' + mm;
} 
    
today = yyyy + '-' + mm + '-' + dd;
document.getElementById("birth").setAttribute("max", today); 
</script>
</html>