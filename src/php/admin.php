<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=bulledefil;charset=utf8', 'root', '');

$requete = $bdd->query("SELECT * from commandes");
$commandes = $requete->fetchAll(); 

if(isset($_POST['supprimer'])){
    $fichier = "../images/".$_POST["fichier"];  
    if(file_exists ( $fichier )){
        unlink($fichier); 
    }
    else{
        echo "Le fichier spécifié n'existe pas";
    }
    
}
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
 if(isset($_POST['submit_mdp'])){
    $pwd= sha1($_POST["mdp"]);
    $confirm_pwd= sha1($_POST["confirm_mdp"]);
    
    if ($pwd==$confirm_pwd) 
								{   echo $pwd;
                                    $sql = $bdd->prepare("UPDATE logadmin SET mdp=:pwd WHERE id_admin=1");
                                    $sql->execute(array(
                                        'pwd'=>$pwd));
									
									$erreur = "Votre compte a bien été créé !";
									//header("Location: ./page_connexion.php");

									}else{echo "Les mots de passe ne sont pas indentiques";}
 }
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
    <title>Page Title</title>

    <link rel="stylesheet" type="text/css" media="screen" href="../css/admin.css">
    <script src="main.js"></script>
</head>
<body>
<a href="../../index.php" class="myButton">Retour à l'accueil</a>
    <?php
    
    if ($_SESSION['rank']=="admin"){
    ?>
    <h2 id="subtitle">Outil d'administration</h2>
    <table id="outil">
    <tr>
    <th> Ajouter une image </th>
    <th> Changer le mot de passe </th>
    </tr>
    <tr>
    <td>
    <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>
			
         <ul>
            <li>Image envoyée: <?php if(isset($_FILES['image']['name'])){ echo $_FILES['image']['name'];}  ?>
            <li>Taille de l'image: <?php if(isset($_FILES['image']['size'])){ echo $_FILES['image']['size'];}  ?>
            <li>Type de l'image: <?php if(isset($_FILES['image']['type'])){ echo $_FILES['image']['type'];} ?>
         </ul>
	
      </form>
    </td>
    <td>
    <form method="post">
    Nouveau mot de passe : <input type="password" name="mdp" placeholder="Mot de Passe" maxlength="20"> <br>

   Confirmation du mot de passe : <input type="password" name="confirm_mdp" placeholder="Mot de Passe" maxlength="20"><br>

   <input type="submit" name="submit_mdp">
   </form>
    </td>
    </tr>
    <tr>
        <td colspan=2>


<table id="images">
<?php
$dir = "../images/";
chdir($dir);
array_multisort(array_map('filemtime', ($files = glob("*.{jpg,png,gif}", GLOB_BRACE))), SORT_DESC, $files);
$i = 0;

foreach($files as $image){?>

<td id="images_td">
<?php  $i += 1; 
 ?>
<img src="../images/<?php echo $image ?> " width="50px"> <br>
<?php echo "<stan id=\"image_nom\">".$image."</p>" ?>


</td>
<?php if($i>10){
    $i=0;
    echo "</tr><tr>";
} 
}
?>
<tr>
<td colspan=20>
    <form method="post"> oui 
    <select name="fichier" ><?php foreach($files as $image){?>
        <option value="<?php echo $image ?>"> <?php echo $image ?> </option>
    <?php } ?>
    </select>
    <input type="submit" value="Supprimer !" name="supprimer">
    </form>
</td>
    </tr>
</table>





</table>
    </td>
    </tr>
    </table>
    <br><br>
    <h2 id="subtitle"> Tableau des commandes </h2>
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