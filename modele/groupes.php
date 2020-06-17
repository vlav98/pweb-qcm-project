

<?php
function liste_groupes() {
	require ("modele/connect_SQL.php") ; //connexion $link à MYSQL et sélection de la base

	$select = "select * from groupe";
				
	$res = mysqli_query($link, $select)	
		or die (utf8_encode("erreur de requête : ") . $select); 

	if (mysqli_num_rows ($res) == 0) {
		return false; //"pas de contacts";
		}
	else {
		$G= array();
		while ($g = mysqli_fetch_assoc($res) and isset($g)) {
			//echo ("Enregistrement : <br /><pre>"); var_dump($c); echo ("</pre>"); 
			$G[] = $g; //stockage des enregistrements dans $C
		}			
		return $G;
	}	
}
?>