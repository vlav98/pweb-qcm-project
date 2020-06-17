<?php
	
	
function addEtu(){
		
		require ("connect_SQL.php") ; 
		//connexion $link à MYSQL et sélection de la base
		
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$login=$_POST['login'];
		$pass=$_POST['pass'];
		$num_grpe=$_POST['groupe'];
		$matricule=$_POST['matricule'];
		$genre = $_POST['genre'];
		
		$sql = "INSERT INTO etudiant(nom, prenom, email, login_etu, 
			pass_etu, matricule, num_grpe, date_etu, bConnect) 
			VALUES('%s','%s','%s','%s','%s','%s','%s', NOW(), 0)"; 
		$req = sprintf($sql, $nom, $prenom, $email, $login, 
		$pass, $matricule, $num_grpe);
		
		$res = mysqli_query($link,$req)
			or die ('erreur de requete : ' . $req);
			
		// if (mysqli_num_rows($resQ) <= 0){
			// echo("aucune question trouvé");
		// }
		// else {
			// $donnees = mysqli_fetch_assoc($resQ);
			// // echo $donnees['texte'];
			// // return $donnees;
		// }

	}
	
function rechercheE($login){
		require ("connect_SQL.php") ; //connexion $link à MYSQL et sélection de la base
			
		$requeteEtud = "select *  from etudiant where login_etu='%s';";
		$sql = sprintf ($requeteEtud, $login);
		$res = mysqli_query($link,$sql)
			or die ('erreur de requete : ' . $sql);
		if (mysqli_num_rows($res)>0) {
			$profil=mysqli_fetch_assoc($res);
			$utilisateur='etudiant';
			return true;
		}
		else {
			return false;
		}	
	}
	
function rechercheP($login){
		require ("connect_SQL.php") ; //connexion $link à MYSQL et sélection de la base
		
		$requeteProf = "select *  from professeur where login_prof='%s';";
		$sql = sprintf ($requeteProf, $login);
		$res = mysqli_query($link,$sql)
			or die ('erreur de requete : ' . $sql);
		if (mysqli_num_rows($res)>0) {
			$profil=mysqli_fetch_assoc($res);
			$utilisateur='professeur';
			return true;
		}

		else {
			return false;
		}	
	}
	
function addProf(){
		require ("connect_SQL.php") ; //connexion $link à MYSQL et sélection de la base
		
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$login=$_POST['login'];
		$pass=$_POST['pass'];
		
		
		$sql = "INSERT INTO professeur(nom, prenom, email, login_prof, 
				pass_prof, date_prof) 
				VALUES('%s','%s','%s','%s','%s', NOW())"; 
		$req = sprintf($sql, $nom, $prenom, $email, $login, $pass);
		
		$res = mysqli_query($link,$req)
			or die ('erreur de requete : ' . $req);
		// if (mysqli_num_rows($resQ) <= 0){
			// echo("aucune question trouvé");
		// }
		// else {
			// $donnees = mysqli_fetch_assoc($resQ);
			// // echo $donnees['texte'];
			// // return $donnees;
		// }
	}
	
function completeGrp($num_grpe){
		require ("connect_SQL.php") ; //connexion $link à MYSQL et sélection de la base
		
/* 		$count = "SELECT COUNT(*) FROM etudiant 
				WHERE num_grpe=%s;"; 
		$req = sprintf($count, $num_grpe);
		
		$res = mysqli_query($link,$req)
			or die ('erreur de requete : ' . $req);
		 */
			
		$query = "SELECT COUNT(*) FROM etudiant 
				WHERE num_grpe = '%s';"; 
		$query2 = sprintf($query, $num_grpe);
		$result = mysqli_query($link ,$query2) or die (mysql_error()); 

		$resultat=mysqli_fetch_row($result); 

		//echo $resultat[0]; // affichage du résultat 
		//echo '<br>';
		if($resultat[0] < 15) {
			return false;
		}
		else {
			return true;
		} 
	}
	
?>