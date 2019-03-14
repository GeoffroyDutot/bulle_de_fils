<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=bulledefil;charset=utf8', 'root', '');

$requete = $bdd->query("SELECT text FROM data_text WHERE name='description' ;");
$description_req = $requete->fetch();

$requete_desc = $bdd->query("SELECT * FROM commandes ORDER BY id_commande DESC ;");
$commandes = $requete_desc->fetchAll();

if(isset($_POST['submit_description'])){
   $description = $_POST['text_description'];
   $req = $bdd->prepare("UPDATE data_text SET text=:description WHERE name='description'");
   $req->execute(array('description'=>$description));

   echo "<div class='succes'> Votre message a bien été envoyé !  (rechargez la page pour voir les modifications) </div>";

   }


if(isset($_POST['supprimer'])){
    if(isset($_POST['fichier'])){
    $fichier = "../photos/".$_POST["fichier"];
    if(file_exists ( $fichier )){
        unlink($fichier);
        echo "<div class='succes' >L'image ".$_POST["fichier"]." a bien été supprimée </div>";
    }
    else{
        echo "<div class='error' >Le fichier spécifié n'existe pas </div>";
    }}else{
        echo "<div class='error' >Vous n'avez pas selectionné de photos </div>";
    }

}
if(isset($_POST['supprimer_banque'])){
    if(isset($_POST['fichier_banque'])){
    $fichier = "../banque/".$_POST["fichier_banque"];
    if(file_exists ( $fichier )){
        unlink($fichier);
        echo "<div class='succes' >L'image ".$_POST["fichier_banque"]." a bien été supprimée </div>";
    }
    else{
        echo "<div class='error' >Le fichier spécifié n'existe pas </div>";
    }}else{
        echo "<div class='error' >Vous n'avez pas selectionné de photos </div>";
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
       $errors[]="<div class='error' > Mauvaise extension </div>";
    }

    if($file_size > 2097152) {
       $errors[]="<div class='error' >Taille de l'image trop grande ! </div>";
    }

    if(empty($errors)==true) {
       move_uploaded_file($file_tmp,"../photos/".$file_name);
       //header("Location: photos/$file_name");
       echo "<div class='succes' >Le fichier est bien envoyé ! </div>";
    }else{
       print_r($errors);
    }
 }
 if(isset($_FILES['image_banque'])){
    $errors= array();
    $file_name = $_FILES['image_banque']['name'];
    $file_size = $_FILES['image_banque']['size'];
    $file_tmp = $_FILES['image_banque']['tmp_name'];
    $file_type = $_FILES['image_banque']['type'];
    $description = $_POST['description_image'];
    $exploded = explode('.',$_FILES['image_banque']['name']);
    $file_ext=strtolower(end($exploded));

    $extensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions)=== false){
       $errors[]="<div class='error' > Mauvaise extension </div>";
    }

    if($file_size > 2097152) {
       $errors[]="<div class='error' >Taille de l'image trop grande ! </div>";
    }

    if(empty($errors)==true) {
       move_uploaded_file($file_tmp,"../banque/".$file_name);

       $sql = $bdd->prepare("INSERT INTO `banquedefil`(`nom_image`, `description`) VALUES (:nom,:description)");
                                    $sql->execute(array(
                                        'nom'=>$file_name,
                                        'description'=>$description));
                                        
       //header("Location: photos/$file_name");

       echo "<div class='succes' >Le fichier est bien envoyé ! </div>";
    }else{
       print_r($errors);
    }

 }
 if(isset($_POST['submit_mdp'])){
    $pwd= sha1($_POST["mdp"]);
    $confirm_pwd= sha1($_POST["confirm_mdp"]);

    if ($pwd==$confirm_pwd)
								{
                                    $sql = $bdd->prepare("UPDATE logadmin SET mdp=:pwd WHERE id_admin=1");
                                    $sql->execute(array(
                                        'pwd'=>$pwd));

									echo "<div class='succes'> Votre message a bien été envoyé ! </div>";

									}else{echo "<div class='error' >Les mots de passes ne sont pas identiques </div>";}
 }
 ?>


<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="../images/favicon.ico"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
    <title>Bulle de fil - Administration</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/admin.css">
    <script src="main.js"></script>
</head>


<body>
<a href="../../index.php" class="myButton">Retour à l'accueil</a>
<a href="demandes.php" class="myButton" id="button_right">Tableau demandes</a>
    <?php

    if ($_SESSION['rank']=="admin"){
    ?>
    <h2 id="subtitle">Outil d'administration</h2>
<table id="outil">
    <tr>
    <th> Ajouter une image dans GALERIE </th>
    <th> Ajouter une image dans BANQUE DE TISSUS </th>
    </tr>
    <tr>
    <td>
    <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>


      </form>
    </td>
    <td>
    <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image_banque" /><br>
         Titre de votre image :<input type="text" name="description_image"/><br>
         <input type = "submit"/>


      </form>
    </td>
    </tr>
    <tr>
        <td colspan=2>

</table><br>
<table>
    <table id="images">
    <tr> 
        <th colspan=20>GALERIE</th>
    </tr>
        <?php
        $dir = "../photos/";
        chdir($dir);
        array_multisort(array_map('filemtime', ($files = glob("*.{jpg,png,gif}", GLOB_BRACE))), SORT_DESC, $files);
        $i = 0;

        foreach($files as $image){?>

        <td id="images_td">
        <?php  $i += 1;
        ?>
        <img src="../photos/<?php echo $image ?> " width="50px"> <br>
        <?php echo "<stan id=\"image_nom\">".$image."</p>" ?>


        </td>
        <?php if($i>10){
            $i=0;
            echo "</tr><tr>";
        }
        }
        ?>
        </tr>
        <tr>

        <td colspan=20>
            <form method="post">
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
 
<table>
    <table id="images">
    <tr> 
        <th colspan=20>BANQUE DE TISSUS</th>
    </tr>
        <?php
        $dir = "../banque/";
        chdir($dir);
        array_multisort(array_map('filemtime', ($files = glob("*.{jpg,png,gif}", GLOB_BRACE))), SORT_DESC, $files);
        $i = 0;

        foreach($files as $image){?>

        <td id="images_td">
        <?php  $i += 1;
        ?>
        <img src="../banque/<?php echo $image ?> " width="50px"> <br>
        <?php echo "<stan id=\"image_nom\">".$image."</p>" ?>


        </td>
        <?php if($i>10){
            $i=0;
            echo "</tr><tr>";
        }
        }
        ?>
        </tr>
        <tr>

        <td colspan=20>
            <form method="post">
            <select name="fichier_banque" ><?php foreach($files as $image){?>
                <option value="<?php echo $image ?>"> <?php echo $image ?> </option>
            <?php } ?>
            </select>
            <input type="submit" value="Supprimer !" name="supprimer_banque">
            </form>
        </td>
            </tr>





    </table>
    
</table>
 
   
<br>
<table>
<form method="post">
<th> Changer la description de l'accueil </th>
<tr> <td>
<textarea style="margin: 0px; width: 90%; height: 200px;" name="text_description"><?php echo $description_req['text'];?>
</textarea><br><br>
<input type="submit" name="submit_description" value="Modifier">
</td></tr>
</table>

  <br><br>


           





   
<br>
<table>
    <tr>
        <th>
            Modifier votre mot de passe
        </th>
    </tr>
    <tr>
    <td>
    <form method="post">
    Nouveau mot de passe : <input type="password" name="mdp" placeholder="Mot de Passe" maxlength="20"> <br>

   Confirmation du mot de passe : <input type="password" name="confirm_mdp" placeholder="Mot de Passe" maxlength="20"><br>

   <input type="submit" name="submit_mdp">
   </form>
    </td>
</table>

</body>
<?php
          }else{
              echo "Vous n'etes pas connecté.";
          }
          ?>
</html>
