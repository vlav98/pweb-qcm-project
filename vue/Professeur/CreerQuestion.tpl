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
				
		<form action="index.php?controle=Professeur&action=CreerQuestion" method="post">		
		<br />Thème : <select name='themequest'> 
		<?php
		if ($themeq!=false) {
			foreach($themeq as $v) {
				if($v["id_theme"]==$themequest){$selec='selected="selected"';}else{$selec='';}
				echo( '<option  value='.$v["id_theme"].' method='.'"post"'.$selec.' >'.$v["titre_theme"].'</option>'); 
		}}
		?>
		</select><br>
		<br />Titre<input type="texte" name="titrequestion" value=<?php echo('"'.$titrequestion.'"');?> ><br>	
		<br />Texte de la question<input type="texte" name="textequestion" value=<?php echo('"'.$textequest.'"');?>><br>
		<br />Nombre de bonne réponse<input type="texte" name="bmultiple" value=<?php echo('"'.$bmultiple.'"');?>><br>
		
		<br />Nombre réponse<input type="texte" name="nbrep" value=<?php if ($nbrep==0){$nbrep='';} echo('"'.$nbrep.'"');?>><br>
		<input type="submit" value="Ajouter des réponses" name="bouton">
		
		<div name="rep">
		<?php if($nbrep!=''){
			for($i=1;$i<=$nbrep;$i++){
			echo('<br /><br />Réponse'.$i.'<br> Texte de la réponse<input type="texte" name="textereponse[]"><br>
		<br />Bonne réponse <input type="checkbox" name="bonnereponse[]" value="1"><br>
		<br />Mauvaise réponse <input type="checkbox" name="bonnereponse[]" value="0"><br>
		</div>');
			}
		}?>		
		<input type= "submit" name="bouton" value= "Ajouter" /> 
		</form> 	
	<div > <?php	echo('Professeur : </br>Nom : '.utf8_encode($_SESSION['profil']['nom']).' Prénom : '.utf8_encode($_SESSION['profil']['prenom']).'<br>');	  ?>  </div>   	   
	</body></html>
	
