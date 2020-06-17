<!doctype html>
	<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>authentification - 2 fichiers</title>
		<!-- 	<link rel="stylesheet" href="style.css">
			<script src="script.js"></script>
		-->
		
	</head>
	<body>
	<form action="index.php?controle=Professeur&action=accueil" method="post">
		<input type="submit" value="Accueil">
	</form>
	<form action="index.php?controle=Professeur&action=CreerTheme" method="post">
	<br />Titre du thème : <input type="texte" name="titretheme"><br>
	<br />Description du thème : <input type="texte" name="desctheme"><br>
	<input type="submit" value="Ajouter">	
	</form>	
	
	
   
	<div > <?php	echo('Professeur : </br>Nom : '.utf8_encode($_SESSION['profil']['nom']).' Prénom : '.utf8_encode($_SESSION['profil']['prenom']).'<br>');	  ?>  </div>   	   
	</body></html>
	
