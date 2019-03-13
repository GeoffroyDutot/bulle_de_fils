<?php

session_start();

/* ICI METTER LA CONNEXION BDD */

$bdd = new PDO('mysql:host=localhost;dbname=bulledefil;charset=utf8', 'root', '');

if (isset($_POST["formconnexion"])) {

	$login = htmlspecialchars($_POST["login"]);
	//$mdpconnect = sha1($_POST["mdpconnect"]);
    $mdpconnect = sha1($_POST["mdpconnect"]);
	
	if (!empty($login) AND !empty($mdpconnect)) {
		$requser = $bdd ->prepare("SELECT * FROM logadmin WHERE login = ? AND mdp = ?");
		$requser->execute(array($login, $mdpconnect));
		$userexist = $requser->rowCount();

		if($userexist == 1){
			$userinfo = $requser->fetch();

			$_SESSION["rank"] = $userinfo["rank"];
			header("Location: admin.php");
		}
		else{
			$erreur = "Votre informations sont incorrects";
		}


	}
	else{
	$erreur = "Saississez touts les champs";
	}
}



?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8"></meta>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
	<title>Bulle de fil - Connexion</title>
	<link rel="stylesheet" type="text/css" href="../css/theme.css">
	<link rel="stylesheet" type="text/css" href="../css/connexion.css">


</head>

<body>

		<div align="center" class="connexion">
			<form method="POST" action="">
				<h1>CONNEXION</h1>
				<form action="" method="post">
				<table id="table">
 				<center>
 		<label for="login">Login : </label>
 		<input type="text" name="login" placeholder="Login" value="<?php if(isset($mailconnect)) {echo $mailconnect; } ?>"><br><br>
 		<label for="password">Mot de passe</label>
 		<input type="password" name="mdpconnect" placeholder="Mot de passe"><br><br>
		<input type="submit" value="Se connecter" name="formconnexion"><br>

			</center>
			</table>
			</form>
			<br>

			<center class="erreur_connexion">
				<?php
				if (isset($erreur)) {
					echo $erreur;
					# code...
				}
				?>
			</center>

		</div>

</body>
</html>
