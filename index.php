<?php
    session_start();
    $_SESSION['rank']="user";
    $bdd = new PDO('mysql:host=localhost;dbname=bulledefil;charset=utf8', 'root', '');
    $requete = $bdd->query("SELECT text FROM data_text WHERE name='description' ;");
    $description = $requete->fetch();
    
?>
<!DOCTYPE html>
<html lang="FR-fr">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="src/images/favicon.ico"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
    <link rel="stylesheet" type="text/css" href="./src/css/theme.css">
    <link rel="stylesheet" type="text/css" href="./src/css/index.css">

    <title>Bulle de Fil</title>
</head>
<body>

<header>
    <a href="index.php"><img  id="logo" src="src/images/logo.jpg"></a>
    <img id="entete"src="src/images/entete.PNG">
    <!-- <strong><h1 id="titre">Galerie</h1></strong> -->


</header>

<div class="menu">
    <ul>
        <li><a href="./index.php">ACCUEIL</a></li>
        <li><a href="./src/php/galerie.php">GALERIE</a></li>
        <li><a href="./src/php/bank.php">BANQUE DE TISSUS</a></li>
        <li><a href="./src/php/contact.php">CONTACT</a></li>
    </ul>
</div>

<div class="autor">
<h1>Sophie Petitjean </h1>

 <!-- <img src="./src/image/im.jpg">          image creatice -->

<p id="description"> <?php echo $description['text'] ?>

</p>
</div>
<div class="follow">
    <p>Vous pouvez me suivre sur les liens suivants :</p>

        <a href="https://www.facebook.com/bulledefil/"><img src="src/images/Facebook-logo.png" width="75px"></a>
        <a href="https://www.instagram.com/bulledefil/"><img src="src/images/instagram.png" width="75px"></a>
        <a href="https://www.etsy.com/fr/shop/bulledefil?fbclid=IwAR2Fr7S2dXXVn0s2KjHjuwyoxam2hRSo5cqJN9UPfvNzuoVUgndqHYthhKQ#items"><img src="src/images/etsy.png" width="75px"></a>
    </ul>
</div>

<footer id="relative">
  <ul>
    <u><a href="./src/html/cgu.html">CGU</a></u>&nbsp&nbsp&nbsp
   <u><a href="./src/html/mention_legal.html">MENTIONS LEGALES</a></u>
      <a href="./src/php/connexion.php" class="co">*</a>
  </ul>
</footer>

</body>
</html>
