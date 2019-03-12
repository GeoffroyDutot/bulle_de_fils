<?php

/* Connection à la base de données */

$bdd = new PDO('mysql:host=localhost;dbname=bulledefil;charset=utf8', 'root', '');

if (isset($_POST["valider"])) {
		$prenom= htmlspecialchars($_POST["prenom"]);
		$nom= htmlspecialchars($_POST["nom"]);
		$mail= htmlspecialchars($_POST["mail"]);



		$numero = htmlspecialchars($_POST["numero"]);
        $objet = htmlspecialchars($_POST["objet"]);

	if (!empty($_POST["prenom"]) AND !empty($_POST["nom"]) AND !empty($_POST["mail"]) AND !empty($_POST["objet"])) {
	/* C'est plus sécurisé de passer les reponses en variable HP */


					/* TEST FORMAT ADRESSE EMAIL */
					if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {


								/* Envoie vers la BDD */

									$sql = $bdd->prepare("INSERT INTO commandes(prenom, nom, mail, telephone, objet) VALUES (?, ?, ?, ?, ?)");
									$sql->execute(array(
									    $prenom, $nom, $mail, $numero, $objet));
									$erreur = "Votre commande a bien été prise en compte !";
									//header("Location: ./index.php");

									}


		else
		{$erreur = "Votre email n'est pas valide";}
		}

	/* TEST SI TOUT LES CHAMPS SONT COMPLETES */
	else
	{
		$erreur = "Tout les champs obligatoires doivent être completés !";
	}
	;}


?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"></meta>
<title>Bulle de fil - Contact</title>
<link rel="stylesheet" type="text/css" href="../css/contact.css">
    <link rel="stylesheet" type="text/css" href="../css/theme.css">

</head>

<body>

<header>
    <a href="../../index.php"> <img  id="logo" src="../images/logo.jpg"> </a>
    <img id="entete"src="../images/entete.PNG">
   <!-- <strong><h1 id="titre">Galerie</h1></strong> -->
</header>

<?php include('navbar.php') ?>

<div class="block_articles">
	<h1 style="text-align: center;">Contact</h1>
	<form action="" method="POST">
	<table id="table">

		<tr><td class="txt">*Prénom :<br> <input type="text" name="prenom" placeholder="Prénom" maxlength="30" value=" <?php if(isset($_POST["valider"])){  echo $_POST['prenom']; }?>"></td></tr>
		<tr><td class="txt">*Nom :<br> <input type="text" name="nom" placeholder="Nom" maxlength="30" value="<?php if(isset($_POST["valider"])){ echo $_POST['nom']; } ?>"></td></tr>
		<tr><td class="txt">*Adresse Email :<br> <input type="email" name="mail" placeholder="exemple@email.fr" value="<?php if(isset($_POST["valider"])){ echo $_POST['mail']; }?>"></td></tr>
		<tr><td class="txt">Telephone :<br> <input type="text" name="numero" placeholder=" 06 01 02 03 04" maxlength="75" value="<?php if(isset($_POST["valider"])){ echo $_POST['numero']; }?>"></td></tr>
		<tr><td class="txt">*Objet de votre commande : <br><textarea name="objet" rows=2 cols=20 value="<?php if(isset($_POST["valider"])){ echo $_POST['objet']; } ?>" ></textarea>
		<tr><td class="txt"><i><h6>*Champs obligatoires<br></h6></i></td></tr>
		<tr>

		<tr><td align="center"></td></tr>


		</table><center>

			<br>
			<input type="submit" value="Confirmer" name="valider"><br><br>



	</form>
	</div>

<?php include('footer.php')?>

</body>
</html>

<?php
if (isset($erreur)) {
	echo $erreur;
	# code...
}
?>
