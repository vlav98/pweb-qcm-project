<!doctype html>
	<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Resultat</title>
		
	</head>
	<body>
	
	<table>
	<?php
	$nbQuest= nbQuestTest();

	?>
	<tr>
	<th>Etudiant</th>
	<th>Note</th>
	<th>Finale/20</th>
	<?php 
	for($i=1;$i<=$nbQuest['nbQuest'];$i++)	{
		echo('<th>Q'.$i.'</th>');
		
	}	?>
	</tr>	
	<?php
	$notesadd=0;
	$nbeleve=0;
		if($listeEtu!=false){
			foreach($listeEtu as $e){
				if($e['bConnect'] == 0){
					$note = "absent";
					$noteSur20 = "absent";
					if(Bilanexiste($noteSur20, $e['id_etu'])==false){
					newBilan($noteSur20, $e['id_etu']);
					}
				}
				else{
				$note=noteBonneréponse($e['id_etu']);
				$noteSur20=$note/$nbQuest['nbQuest']*20;
				$notesadd+=$noteSur20;
				$nbeleve+=1;
				}
			echo('<tr><th>'.utf8_encode($e['nom']).' '.utf8_encode($e['prenom']).'</th><th>'.$note.'</th><th>'.$noteSur20.'</th>');
			$question = liste_Question();
			foreach($question as $q)	{
				$rep = liste_Réponse($q['id_quest']);
				echo('<th>');
				foreach($rep as $r) {					
					$reponse = reponseEtu($r['id_rep'],$e['id_etu']);
					
					if($r['bvalide'] == 1 ){
						$image='<img src="valider.png"> ';
					}
					else{
						$image='<img src="Mauvais.png"> ';
					}
					if($reponse == true){
						$etat = "X";
					}
					else{
						$etat = "";
					}
				echo($image.''.$etat);
				
				}
				echo('</th>');
				}
				
				echo('</tr>');
			}	
		}
	?>
	</table>
	<?php $moyenne=$notesadd/$nbeleve; echo('</ br>Moyenne : '.$moyenne.'/20<br>');?>
	<form action="index.php?controle=Professeur&action=accueil" method="post">
		<input type="submit" value="Accueil">
		
	</form>
	<form action="index.php?controle=Professeur&action=deconnexion" method="post">
		<input type="submit" value="Déconnexion">
	</form>
	<div ><?php	echo('Professeur : </br>Nom : '.utf8_encode($_SESSION['profil']['nom']).' Prénom : '.utf8_encode($_SESSION['profil']['prenom']).' Test : '.$_SESSION['test']['test'].' Groupe : '.$_SESSION['test']['grpe'].'<br>');?> </div>   	   
	</body></html>
	
