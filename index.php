<?php
  include_once 'utils/redirect.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['name']?></title>
    <link rel="stylesheet" href="css/accueil.css">
    
</head>
<body>
    <!-- header -->
    <?php include 'views/header.php' ?>
    
    
</body>
</html>
