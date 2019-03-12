<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=bulledefil;charset=utf8', 'root', '');

$requete = $bdd->query("SELECT * from commandes");
$commandes = $requete->fetchAll(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/admin.css">
    <script src="main.js"></script>
</head>
<body>
    <?php
    
    if ($_SESSION['rank']=="admin"){
    ?>
    <table>
        <tr>
            <th>
                Numero de la commande
            </th>
            <th>
                Nom
            </th>
            <th>
                Prenom
            </th>
            <th>
                Numero de telephone
            </th>
            <th>
                Mail
            </th>
            <th>
                Objet de la commande
            </th>
            <?php
foreach($commandes as $commande){
    ?>
    <tr>
        <td>
           <?php echo $commande['id_commande']; ?>
        </td>
        <td>
           <?php echo $commande['nom']; ?>
        </td>
        <td>
           <?php echo $commande['prenom']; ?>
        </td>
        <td>
           <?php echo $commande['telephone']; ?>
        </td>
        <td>
           <?php echo $commande['mail']; ?>
        </td>
        <td>
           <?php echo $commande['objet']; ?>
        </td>
    </tr>
    <?php
}}else{
    echo "Vous n'etes pas connecté.";
}
?>
    </table>
</body>
</html>
