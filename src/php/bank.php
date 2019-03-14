<!DOCTYPE html>

<html lang="FR-fr">


<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="../images/favicon.ico"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
    <link rel="stylesheet" type="text/css" href="../css/bank.css">
    <link rel="stylesheet" type="text/css" href="../css/theme.css">
    <title>Bank de fil</title>
</head>


<body>

<!-- logo + banniere + menu -->

  <header>
      <a href="../../index.php"> <img  id="logo" src="../images/logo.jpg"> </a>
      <img id="entete"src="../images/entete.PNG">
      <?php include('navbar.php') ?>
  </header>

<br>

<p class="text_tissus">Plus de 150 tissus bio ou oeko tex comme par exemple du tissus uni ou étoile ou encore liberty. Tous les tissus utilisés sont bios ou oeko tex, un label écologique pour les produits textiles, garantissant l'absence de substances nocives pour la santé, la peau et l'environnement. </p>

<center>
  <table class="tableau_tissus">
      <tr>
          <td><img src="../images/tissus_uni.jpg" class="imgtissu"><br><p>tissus uni</p</td><td><img src="../images/tissus%20liberty.jpg" class="imgtissu"><br><p>tissus liberty</p></td><td><img src="../images/tissus__etoile_gris.jpg" class="imgtissu"><br><p>tissus étoile</p></td>
      </tr>
  </table>
</center>

<!-- Pied de page -->

<footer>
  <?php include('footer.php')?>
</footer>


</body>

</html>
