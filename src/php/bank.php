<?php $bdd = new PDO('mysql:host=localhost;dbname=bulledefil;charset=utf8', 'root', ''); ?>

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
 
<?php
$dir = "../banque/";
chdir($dir);
array_multisort(array_map('filemtime', ($files = glob("*.{jpg,png,gif}", GLOB_BRACE))), SORT_DESC, $files);
$i = 0;

foreach($files as $image){
   ?>

<td>
<?php  $i += 1;
 ?>
<img src="../banque/<?php echo $image ?> " class="images_galerie" width="300px">
<?php $requete = $bdd->prepare("SELECT description FROM banquedefil WHERE nom_image=:nom ;");
 $requete->execute(array('nom'=>$image));
$description_image = $requete->fetch(); 
echo "<br><strong>".$description_image['description']."</strong>";
?>
</td>
<?php if($i>2){
    $i=0;
    echo "</tr><tr>";
} ?>
<?php
}
?>
</table>
</center>

<!-- Pied de page -->

<footer>
  <?php include('footer.php')?>
</footer>


</body>

</html>
