<?php
function accueilTestEtudiant() {
	
	$profil=  isset($_SESSION['profil'])?$_SESSION['profil']:'';
	$session=  isset($_SESSION['session'])?($_SESSION['session']):'';
	
	//require ("./modele/questionEtudiant.php") ;
	require ("./modele/EtudiantBD.php") ;
	// $Question = questTableau($session['idSession']);
	// $groupe = getGroupe($profil['idUser']);
	// $_SESSION['groupe'] = $groupe;
	// require ("./vue/etudiant/sessionEtudiant.tpl");
	
}





?>