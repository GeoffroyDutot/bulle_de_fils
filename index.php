<?php
    session_start();
    $_SESSION['rank']="user";
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

<p id="description"> Couturière indépendante et passionné  depuis une vingtaine d'années, je réalise principalement des accessoires esthétique comme des sacs, trousses pour faciliter la vie de chacun au quotidien

    mais également des coutures pour bébé, enfants, femmes.

    Soucieuse de la qualité de mon travail, j'utilise principalement des tissus bio et oeko tex de bonne qualité veillant à ne pas impacter négativement l'environnement en produisant 0 déchets.

    Aussi les commandes que vous me confierez seront prises au sérieux, personnalisable selon vos critères et effectuées avec professionnalisme.


</p>
</div>

<footer id="relative">
  <ul>
    <a href="./src/html/cgu.html">CGU</a>
    <a href="./src/html/mention_legal.html">MENTIONS LEGALES</a>
      <a href="./src/php/connexion.php" class="co">*</a>
  </ul>
</footer>

</body>
</html>
