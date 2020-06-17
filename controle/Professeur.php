<?php
function questionSelect(){	
			$question='';			
			if (isset($_POST['test'])) {$idtest = $_POST['test'];}
					if (isset($idtest) and ($idtest != "")) {
						$_SESSION['test']=array();
					$_SESSION['test']['test'] = $idtest;
			}
			require('./modele/Professeur/sessionQuestion.php'); 
				$grp=groupe();
				$_SESSION['test']['grpe']= $grp['num_grpe'];					
					$datata=liste_Question($_SESSION['test']['test']);
					if(isset($_POST['question'])){
						$question=$_POST['question'];
						
						if(isset($_POST['bouton'])){
							$bouton=$_POST['bouton'];
							if($bouton=="FIN"){
								$bAutorise="0";	
								questionAutorise($question,$bAutorise);	
								questionTermine($question);
								$nbrep='';
								}
							else if($bouton=="lancer"){
								$bAutorise="1";
								questionAutorise($question,$bAutorise);
								
							}else if($bouton=="Annuler"){
								AnnulerQuestion($question);	
								$nbrep='';								
							}
							$datata=liste_Question($_SESSION['test']['test']); 
							require('./vue/Professeur/ListeQuestionSelectProf.tpl');
							die();
						}
					}
					
				require('./vue/Professeur/ListeQuestionSelectProf.tpl'); 							
}

function accueil(){
		echo('Bienvenue '. utf8_encode($_SESSION['profil']['nom']).' '.utf8_encode($_SESSION['profil']['prenom']));
		require('./vue/Professeur/AccueilProf.tpl');
		}

function lancerQuestion(){
if(!isset($_POST['test'])){			
							require('./modele/Professeur/sessionQuestion.php'); 													
							$datat = liste_test();
					require('./vue/Professeur/LancerTest.tpl');
					
				}
}

function Creersession(){
	require('./modele/Professeur/Ajout.php'); 
	if(isset($_POST['titre']) and isset($_POST['grpe']) and isset($_POST['date']) and isset($_POST['questionSelec'])){
		$création='Creersession';
		$titretest=$_POST['titre'];
		$groupe=$_POST['grpe'];
		$date=$_POST['date'];
		$existe=Testxiste($titretest,$groupe,$date);
		if($existe==false and $titretest!='' and $groupe!='' and $date!='' ){
		creerTest($titretest,$groupe,$date);
		$idtest=idTest($titretest);
		foreach($_POST['questionSelec'] AS $choix){		
             AjouterQuestionSelec($idtest['id_test'],$choix);      
        }
		$phrase="Cela à bien été ajouté ou les champs ne sont pas remplis";
		}
		require('./vue/Professeur/AjouteValide.tpl');
	}else {	
	$theme=theme();		
	$datagroupe = liste_groupes();	
	require('./vue/utilisateur/CreerSession.tpl');
	//require('./vue/utilisateur/AjoutQuestion.tpl');
	}
}		

function CreerTheme(){
	require('./modele/Ajout.php'); 
	if(isset($_POST['titretheme']) and isset($_POST['desctheme']) and $_POST['titretheme']!='' and $_POST['desctheme']!='' ){
		$titre=$_POST['titretheme'];
		$desc=$_POST['desctheme'];
		$existe=Themexiste($titre);
		$création='CreerTheme';
		if($existe==false  ){
		Ajoutertheme($titre,$desc);
		$phrase="Cela à bien été ajouté";
		}
		require('./vue/utilisateur/AjouteValide.tpl');
		}else{require('./vue/Professeur/CreerTheme.tpl');}
}

function CreerQuestion(){
	require('./modele/Professeur/Ajout.php');
	if(isset($_POST['bouton']) and $_POST['bouton']=="Ajouter des réponses"  and isset($_POST['themequest']) and isset($_POST['textequestion']) and isset($_POST['titrequestion']) and isset($_POST['bmultiple']) and isset($_POST['nbrep'])){
		$themequest=$_POST['themequest'];
		$textequest=$_POST['textequestion'];
		$bmultiple=$_POST['bmultiple'];
		$titrequestion=$_POST['titrequestion'];
		$nbrep=$_POST['nbrep'];
		$themeq=theme();
		require('./vue/Professeur/CreerQuestion.tpl');
		die();
		
	}
	if(isset($_POST['themequest']) and isset($_POST['textequestion']) and isset($_POST['titrequestion']) and isset($_POST['bmultiple']) and isset($_POST['textereponse'])  and isset($_POST['bonnereponse'])){		
		$themequest=$_POST['themequest'];
		$textequest=$_POST['textequestion'];
		$bmultiple=$_POST['bmultiple'];
		$titrequestion=$_POST['titrequestion'];
		$nbrep=$_POST['nbrep'];
		$existe=questionexiste($themequest,$titrequestion,$textequest,$bmultiple);
		if($existe==false and $themequest!='' and  $textequest!='' and $bmultiple!='' and $titrequestion!='' and count($_POST['textereponse'])==$nbrep){
			AjouterQuestion($themequest,$titrequestion,$textequest,$bmultiple);
			$idquest=idquest($textequest);
			$reponse=array();
			$reponse=$_POST['textereponse'];
			$bonne=array();
			$bonne=$_POST['bonnereponse'];
			for($i=0; $i<count($reponse) ; $i++){
				$r=$reponse[$i];
				$b=$bonne[$i];
				AjoutReponse($idquest['id_quest'],$r,$b);
			}				
		}
		$phrase="Cela à bien été ajouté";
		$création='CreerQuestion';
		require('./vue/Professeur/AjouteValide.tpl');		
	}else {	
		$titrequestion='';
		$themequest='';
		$textequest='';
		$bmultiple='';	
		$nbrep=0;
		$themeq=theme();
	require('./vue/Professeur/CreerQuestion.tpl');
	die();
	}
	
}

function resultat(){
require('./modele/Professeur/resultat.php');
$listeEtu=liste_etudiant();
TestTermine();
require('./vue/Professeur/resultat.tpl');
}

function deconnexion(){
	session_destroy();
	header('Location:index.php');
}

?>

