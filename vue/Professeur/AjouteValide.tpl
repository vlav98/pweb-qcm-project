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
	<p><?php echo($phrase);?></p>
	<form action="index.php?controle=Professeur&action=accueil" method="post">	
	<input type= "submit" name="bouton" value= "Retourner au menu" /> 
	</form>
	<form  <?php echo('action="index.php?controle=Professeur&action='.$création.'"');?>   method="post">	
	<input type= "submit" name="bouton" value= "Nouveau" /> 
	</form>
		
		
		
   
	<div > <?php echo('Professeur : </br>Nom : '.utf8_encode($_SESSION['profil']['nom']).' Prénom : '.utf8_encode($_SESSION['profil']['prenom']).'<br>');?>  </div>   	   
	</body></html>
	
