<?php  

function ident(){
	$login= isset($_POST['login'])?($_POST['login']):'';
	$pass= isset($_POST['pass'])?($_POST['pass']):'';
	$utilisateur= '';
	
	

	if  (!isset($_POST['login']) and !isset($_POST['pass'])){
		$_SESSION['profil']='';
		require('./vue/ident.tpl') ;
	} 
	else if  (isset($_POST['login']) and isset($_POST['pass'])){
			$login=$_POST['login'];
			$pass=$_POST['pass'];
			//$utilisateur=$_POST['util'];
				$profil = array(); //profil affecté par l'appel à verif_ident
				require('./modele/Login.php');
				if  (! verif_ident($login,$pass,$profil, $utilisateur)) {
					$msg ="erreur de saisie";
					require('./vue/ident.tpl') ;
				  }
				else  { 
				if($utilisateur == 'professeur'){
						$_SESSION['profil']= $profil;
						header('Location:index.php?controle=Professeur&action=accueil');
				}
				else if($utilisateur == 'etudiant'){
					$_SESSION['profil']= $profil;
					$nomP= $_SESSION['profil']['nom'];
					$prenomP= $_SESSION['profil']['prenom'];
					$groupeE= $_SESSION['profil']['num_grpe'];
						header('Location:index.php?controle=Etudiant&action=bienvenue');				
				}	
			}	
	}	
}
	
function actionstart(){
	if(isset($_POST['bouton2'])){
		$b=$_POST['bouton2'];
		if($b=='Créer un compte'){
			require('.\controle\register.php');
			showReg();	
		}else{
			ident();
		}
	}else{
		require('.\vue\AccueilUtil.tpl');
	}
}

?>