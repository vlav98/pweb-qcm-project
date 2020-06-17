<?php
session_start();
		
//hypothèse 2 paramètres d'entrée, controle et action, avec l'url de index.php
// exmple : index.php?controle=c1&action=a12

if((count($_GET)!=0) && !(isset($_GET['controle']) && isset($_GET['action']))){
		require('./vue/erreur404.tpl');
}
	
else{
	
	if((!isset($_SESSION['profil']) || count($_GET)==0)){
		$controle="utilisateur";
		$action="actionstart";	
		$theme="";
	}
	
		if (isset($_GET['controle']) & isset($_GET['action'])) {
		$controle = $_GET['controle'];
		$action= $_GET['action'];
		$theme="";		
		
	}
	
	
	//inclure le fichier php de contrôle 
	//et lancer la fonction-action issue de ce fichier.	
		
		require ('./controle/' . $controle . '.php');   
		$action (); 

}	

?>
