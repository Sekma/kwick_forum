<?php
session_start();
$myName=$_SESSION['name'];
// chemin d'accès à votre fichier JSON
$file = 'articles.json'; 
// mettre le contenu du fichier dans une variable
$data = file_get_contents($file); 
// décoder le flux JSON
$obj = json_decode($data); 
// accéder à l'élément approprié
/* echo "<pre>";
print_r($obj);
echo "</pre>";
echo $obj[0]->article; */

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $myName?></title>
    <script>
        let totalAchat=[];
        function getPrice(productPrice) {
            
    var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const price = document.createElement("li");
            price.innerHTML = "Le prix est: " + productPrice;
            document.getElementById("prices").appendChild(price);
           
            totalAchat.push(productPrice);
           
            function sumAll() {
                let sum = 0;
                for(let i = 0; i < totalAchat.length; i++) {
                    sum += totalAchat[i];
                }
                return sum;
                }
                document.getElementById("total").innerHTML = sumAll(productPrice);
               
        } 
    }; 
    xhttp.open("GET", "?" + productPrice, true);
    xhttp.send();
}
    </script>
</head>
<body>
    <!-- header -->
    <header">
    
    <h1>Welcome <?php echo $myName ?></h1>
            <nav>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="boutique.php">Boutique</a></li>
                    <li><a href="">About</a></li>
                    <li><a onclick='did.showModal()'>Deconnexion</a></li>
                </ul>
                <dialog class="did" id="did">
                            <p>Voulez-vous vraiment Déconnecter?</p>
                            <button class="btnDialog" onclick="did.close()">Non</button>
                            <button class="btnDialog"><a href="../user/logout.php">Oui</a></button>
                </dialog>
                <a href="pannier.php"><img src="../images/pannier.png"></a>
            </nav>
        </header>
    <main>
    <h2>Boutique</h2>
<?php
foreach($obj as $art){
    echo "<div onclick=\"getPrice($art->price)\">$art->article <span>$art->price</span></div><br><br>";

    
}
/* if(isset($_GET["hello"])) {
    echo "<div id=\"price\">le prix est:" .$_GET["hello"]. "dt.</div>";
    
} */
?>
<ul id="prices"></ul>
<p id="total"></p>
    </main>
    
</body>
</html>