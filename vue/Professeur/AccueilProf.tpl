<!doctype html>
	<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>authentification - 2 fichiers</title>
		
	</head>
	<body>
	
	
	<div>
		</br><form action="index.php?controle=Professeur&action=lancerQuestion" method="post">         
		<input type= "submit" value= "Lancer session QCM" />  		
		</form>
		<form action="index.php?controle=Professeur&action=Creersession" method="post">         
		<input type= "submit" value= "Créer test" />  		
		</form>
		<form action="index.php?controle=Professeur&action=CreerTheme" method="post">         
		<input type= "submit" value= "Créer thème" />  		
		</form>
		<form action="index.php?controle=Professeur&action=CreerQuestion" method="post">         
		<input type= "submit" value= "Créer question" />  		
		</form><br>
		
		<form action="index.php?controle=Professeur&action=deconnexion" method="post">
		<input type="submit" value="Déconnexion">
		</form>
	</div>
	<div ><?php	echo('Professeur : </br>Nom : '.utf8_encode($_SESSION['profil']['nom']).' Prénom : '.utf8_encode($_SESSION['profil']['prenom']).'<br>');?>  </div>   	   
	</body></html>
	
