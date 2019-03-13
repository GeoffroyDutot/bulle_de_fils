<!DOCTYPE html>
<html lang="FR-fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
    <link rel="stylesheet" type="text/css" href="../css/galerie.css">
    <link rel="stylesheet" type="text/css" href="../css/theme.css">
    <title>Bulle de Fil</title>
</head>
<body>

<header>
    <a href="../../index.php"> <img  id="logo" src="../images/logo.jpg"> </a>
    <img id="entete"src="../images/entete.PNG">
    <!-- <strong><h1 id="titre">Galerie</h1></strong> -->
</header>


<?php include('navbar.php') ?>

<table id="tableau_galerie">



<?php
$dir = "../photos/";
chdir($dir);
array_multisort(array_map('filemtime', ($files = glob("*.{jpg,png,gif}", GLOB_BRACE))), SORT_DESC, $files);
$i = 0;

foreach($files as $image){
   ?>

<td>
<?php  $i += 1;
 ?>
<img src="../photos/<?php echo $image ?> " class="images_galerie" width="300px"> 
</td>
<?php if($i>2){
    $i=0;
    echo "</tr><tr>";
} ?>
<?php
}
?>
</table>
<?php include('footer.php')?>

</body>
</html>
