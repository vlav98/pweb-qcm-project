<?php  

function verif_ident($login,$pass, &$profil, &$utilisateur) {
		require ("connect_SQL.php");
		$requeteProf = "select *  from professeur where login_prof='%s' and pass_prof='%s' ;";
		$sql = sprintf ($requeteProf, $login, $pass);
		$res = mysqli_query($link,$sql)
			or die ('erreur de requete : ' . $sql);
		if (mysqli_num_rows($res)>0) {
			$profil=mysqli_fetch_assoc($res);
			$utilisateur='professeur';
			return true;
		}
		
		$requeteEtud = "select *  from etudiant where login_etu='%s' and pass_etu='%s' ;";
		$sql = sprintf ($requeteEtud, $login, $pass);
		$res = mysqli_query($link,$sql)
			or die ('erreur de requete : ' . $sql);
		if (mysqli_num_rows($res)>0) {
			$profil=mysqli_fetch_assoc($res);
			$utilisateur='etudiant';
			$select2 = "UPDATE etudiant SET bConnect='1' WHERE etudiant.id_etu='".$profil['id_etu']."' ;";		
			$res2 = mysqli_query($link, $select2)	
			or die (utf8_encode("erreur de requete : ") . $select);
			return true;
		}

		else {
			return false;
		}	
		//return false;
	}

function Reponse($idrep) {
	require ("modele/connect_SQL.php") ; //connexion $link à MYSQL et sélection de la base
	$select2 = "UPDATE etudiant SET bConnect='0' WHERE etudiant.id_etu='".$profil['id_etu']."' ;";		
			$res2 = mysqli_query($link, $celect2)	
			or die (utf8_encode("erreur de requete : ") . $select);
	
}
	


?>