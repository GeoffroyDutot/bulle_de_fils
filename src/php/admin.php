<?php $bdd = new PDO('mysql:host=localhost;dbname=bulledefil;charset=utf8', 'root', '');
$requete = $bdd->query("SELECT * from commandes");
$commandes = $requete->fetchAll(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <table>
        <tr>
            <td>
                Numero de la commande
            </td>
            <td>
                Nom
            </td>
            <td>
                Prenom
            </td>
            <td>
                Mail
            </td>
            <td>
                Numero de telephone
            </td>
            <td>
                Objet de la commande
            </td>

    </table>
</body>
</html>

<?php
foreach($commandes as $commande){
    echo $commande['id_commande']."<br>";
}
?>
