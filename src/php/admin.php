<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=bulledefil;charset=utf8', 'root', '');

$requete = $bdd->query("SELECT * from commandes");
$commandes = $requete->fetchAll(); 


if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $exploded = explode('.',$_FILES['image']['name']);
    $file_ext=strtolower(end($exploded));
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="pas bonne extension.";
    }
    
    if($file_size > 2097152) {
       $errors[]='Taille du fichier trop grand !';
    }
    
    if(empty($errors)==true) {
       move_uploaded_file($file_tmp,"../images/".$file_name);
       //header("Location: images/$file_name");
       echo "Deplacement reussis !";
    }else{
       print_r($errors);
    }
 }
 
 ?>
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
    <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>
			
         <ul>
            <li>Sent file: <?php if(isset($_FILES['image']['name'])){ echo $_FILES['image']['name'];}  ?>
            <li>File size: <?php if(isset($_FILES['image']['size'])){ echo $_FILES['image']['size'];}  ?>
            <li>File type: <?php if(isset($_FILES['image']['type'])){ echo $_FILES['image']['type'];} ?>
         </ul>
			
      </form>
</body>
</html>
<?php
  
?>

      
      
