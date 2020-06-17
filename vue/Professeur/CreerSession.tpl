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

	<form action="index.php?controle=Professeur&action=Creersession"  method="post">	
	Groupe : <select name='grpe'>
		<?php
		if (count ($datagroupe)>0) {
			foreach($datagroupe as $v) {
				echo( '<option>'.$v["num_grpe"].'</option>'); 
		}}
		?>
		</select>
		<br />Titre du test : <input type= "texte" name="titre" ><br>
		<br />Date du test : <input type= "date" name="date" ><br>
				
		<?php	
		if ($theme!=false) {
			foreach($theme as $v) {				
				$listequestion=liste_Questiontheme($v['id_theme']);
				echo('<table><tr><th>'.$v['titre_theme'].'</th></tr>');
				if ($listequestion!=false) {
					foreach($listequestion as $q) {				
						echo('<tr><th><input type="checkbox" name="questionSelec[]" value='.$q['id_quest'].'>'.utf8_encode($q['texte']).'</th></tr>');
					}	
				}
				else if($listequestion==false){echo('<tr><th>Pas de questions dans ce thème</th></tr>');}
				echo('</table>');
			}
		}		
		?>
	<input type= "submit" value= "Ajouter">
	</form> 
	<div ><?php	echo('Professeur : </br>Nom : '.utf8_encode($_SESSION['profil']['nom']).' Prénom : '.utf8_encode($_SESSION['profil']['prenom']).'<br>');	  ?>  </div>   	   
	</body></html>
	
