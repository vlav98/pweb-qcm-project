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
	
		<?php	
				//var_dump($data);
				//var_dump($datat);
				//die('erreur : ' );
				
		?>
		
		<form action="index.php?controle=Professeur&action=questionSelect" method="post">
		
		
		
		
		<?php
	

		if ($datat!=false) {
			echo('<select name="test">');
			foreach($datat as $v) {
				echo( '<option  value='.$v["id_test"].' method='.'"post"'.' >'.$v["titre_test"]." groupe ".$v["num_grpe"].'</option>');
			}
			echo('</select><input type= "submit" value= "ok" />');
		}else { echo('Aucun test'); }
		?>
			
		
			  
		
		</form>
		

		<form action="index.php?controle=Professeur&action=accueil" method="post">
		<input type="submit" value="Accueil">
		</form>
   
            
	<div ><?php	echo('Professeur : </br>Nom : '.utf8_encode($_SESSION['profil']['nom']).' Prénom : '.utf8_encode($_SESSION['profil']['prenom']).'<br>');?>   </div>   	   
	</body></html>
	
