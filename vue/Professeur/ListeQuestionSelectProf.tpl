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
	<form action="index.php?controle=Professeur&action=questionSelect" method="post">
	<table>
   <tr>
	<th>Selection</th>
	<th>Question</th> 
	<th>Réponse</th>
	
	</tr>
	<?php	
		
		if ($datata!=false) {
			foreach($datata as $v) {
				$nbrepgroupe=nbrepgroupe($v['id_quest']);
				$terminé='disabled="false" ></th><th><input type="submit" name="bouton" value= "FIN" disabled="false" />'.utf8_encode($v['texte']).'<input type="submit" name="bouton"  value="Annuler" disabled="false" /></th>';
					$questionterminé=Question($v['id_quest']);
					$reponse=liste_Réponse($v['id_quest']);
				echo( '<tr id='.$v['id_quest'].'><th><input  type="radio" name="question" value='.$v['id_quest'].' '); 
				
				if ($v['id_quest']!=$question) { 
					if($questionterminé['bTermine']==0){
						echo('></th>'.'<th>'.utf8_encode($v['texte']).'</th>');
					}else if($questionterminé['bTermine']==1){
							echo($terminé);
						}
						echo('<th>');
					if($reponse!=false){
						foreach($reponse as $r){	
						$nbrep=nbreponse($v['id_quest'],$r['id_rep']);		
							if($nbrep['nb']==0){$nbrep['nb']='';}
							if($r['bvalide']==1){
							echo(utf8_encode('<br />'.$r['texte_rep']).'<img src="valider.png"> '.' '.$nbrep['nb'].'<br>  '	);
							} else {echo(utf8_encode('<br />'.$r['texte_rep']).'<img src="Mauvais.png">'.' '.$nbrep['nb']).' <br> ';}							
						}
					}
						 echo('</th></tr>');					
				}
				else if ($v['id_quest']==$question ) {
					
						if($questionterminé['bTermine']==0){
							echo('checked="checked"></th><th><input type="submit" name="bouton" value= "FIN" />'.utf8_encode($v['texte']).'<input type="submit" name="bouton"  value="Annuler" />'.$nbrepgroupe['nb'].'</th>');
						}else if($questionterminé['bTermine']==1){
							echo($terminé);
						}
				echo('<th>');
				if($reponse!=false){
				foreach($reponse as $r){
					$nbrep=nbreponse($v['id_quest'],$r['id_rep']);
					if($nbrep['nb']==0){$nbrep['nb']='';}
					if($r['bvalide']==1){
					echo(utf8_encode('<br />'.$r['texte_rep'].'<img src="valider.png">'.' '.$nbrep['nb'].'<br> '));
					} else {echo(utf8_encode('<br />'.$r['texte_rep']).'<img src="Mauvais.png">'.' '.$nbrep['nb'].' <br>');}					
				}
				echo('</th></tr>');
				}	
				}
			}
		}
		
		
		
		?>
</table>	
<input type= "submit" name="bouton" value= "lancer" /> 
</form>
<form action="index.php?controle=Professeur&action=resultat" method="post">
<input type="submit" value="afficher les resultats" >
</form>
		
		
   
	<div ><?php $nbconnect= nbetuconnect();	echo('Professeur : </br>Nom : '.utf8_encode($_SESSION['profil']['nom']).' Prénom : '.utf8_encode($_SESSION['profil']['prenom']).' Test : '.$_SESSION['test']['test'].' Groupe : '.$_SESSION['test']['grpe'].'('.$nbconnect['nb'].')'.'<br>');?></div>   	   
	</body></html>
	
