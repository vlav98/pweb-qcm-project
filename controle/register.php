<?php
	
function showReg(){
	require('./modele/groupes.php'); 
	$grpe = liste_groupes();
	require('./vue/utilisateur/register.tpl'); 
	
}
	
function save(){
	require('./modele/registerBD.php'); 
	require('./modele/groupes.php'); 
	$grpe = liste_groupes();	
	if(isset($_POST["nom"]) AND isset($_POST["prenom"]) AND isset($_POST["email"]) AND
	isset($_POST["login"]) AND isset($_POST["pass"]) AND isset($_POST["pass2"]) AND 
	((isset($_POST["matricule"]) AND isset($_POST["groupe"])) OR $_POST['role']=="professeur") and
	$_POST["nom"]!='' and $_POST["prenom"]!='' and $_POST["email"]!='' and $_POST["login"]!='' and $_POST["pass"]!='' and $_POST["pass2"]!=''){
		if($_POST["pass"] == $_POST["pass2"]){
			if(isset($_POST["role"])){
				$role = $_POST["role"];
			}else {
					echo('Veuillez indiquer si vous êtes étudiant ou professeur.');
					require('./vue/utilisateur/register.tpl');
				}
			$log=$_POST["login"];
			if($role == "etudiant"){
				$num_grpe=$_POST["groupe"];
				if(completeGrp($num_grpe)==false){			
					$rec = rechercheE($login);
					if ($rec == false){
						if(is_valid_form($log, $_POST["pass"])){
						addEtu();
						echo("Vous avez bien été inscrit");
						require('./vue/utilisateur/register.tpl');
						}else{
							echo("Votre mot de passe n'est pas conforme");
							require('./vue/utilisateur/register.tpl');
						}
					}
					else{
						echo($log. ' a déjà été inscrit.');
						require('./vue/utilisateur/register.tpl');
					}
				}else {
					echo('Le groupe auquel vous essayez de vous intéger a déjà atteint sa capacité maximale.');
					require('./vue/utilisateur/register.tpl');
				}
			}else if ($role == "professeur"){
					$rec = rechercheP($_POST["login"]);

					if ($rec == false){
						if(is_valid_form($log, $_POST["pass"])){
							addProf();
							echo("Vous avez bien été inscrit");
							require('./vue/utilisateur/register.tpl');
						}else{
							echo("Votre mot de passe n'est pas conforme");
							require('./vue/utilisateur/register.tpl');
						}
					}
					else{
						echo($log. ' a déjà été inscrit.');
						require('./vue/utilisateur/register.tpl');
					}
				}
		}
		else {
			echo('Vos mots de passe ne sont pas identiques.');
			require('./vue/utilisateur/register.tpl');
		}
		}
	else if(isset($_POST["nom"])) {	
		echo("Des champs n'ont pas été remplis");
		require('./vue/utilisateur/register.tpl');
	}
	else {require('./vue/utilisateur/register.tpl');}
	
}

function is_valid_login($login) {
	return strlen($login) >= 1;
}

function is_valid_password($password) {
	return preg_match('/[0-9]/', $password) && preg_match('/[A-Z]/', $password) && preg_match('/[a-z]/', $password) && strlen($password) >= 6;
}

function is_valid_form($login, $password){
	return is_valid_login($login) && is_valid_password($password);

}
	
?>