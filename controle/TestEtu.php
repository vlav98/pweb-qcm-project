<?php 

function showQu($id_question, $id_reponse){
	//rep qd bAutorises = 1;
	require ("modele/connect_SQL.php") ; //connexion $link à MYSQL et sélection de la base
	
	$select = "select * from question, theme where question.id_theme=theme.id_theme and theme.titre_theme='%s';";
	$sql = sprintf ($select,$theme);		
	$res = mysqli_query($link, $sql)	
		or die (utf8_encode("erreur de requete : ") . $select); 
	if (mysqli_num_rows ($res) == 0) {
		return false;
		}
	else {
		if(bAutorise==1){
			$question=$_POST['question'];
			echo($question);
		}
	}				
	require('./vue/utilisateur/ListeQuestionSelectProf.tpl'); 	
	
}

?>