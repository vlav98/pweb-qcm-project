<?php

// chez vous, par exemple

// $hote='localhost';   		
// $login='root';  	
// $pass=''; 		
// $bd='econtact';  //le nom de la base, en fait


//à l'iut
$hote="localhost";   		//ou localhost
$loginn="root";  		
$passs=""; 			
$bd="pweb_projet";

if (! isset ($link)) {


$link = mysqli_connect($hote, $loginn, $passs) 
		or die ("erreur de connexion :" . mysqli_connect_error() . 'numéro :' . mysqli_connect_errno()); 
mysqli_select_db($link, $bd) 
		or die ("erreur d'accès à la base :" . $bd);
		
}

//test : die ('ok connexion'); 

?>