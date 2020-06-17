	<!doctype html>
	<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>authentification - 2 fichiers</title>
		<!-- 	<link rel="stylesheet" href="style.css">
			<script src="script.js"></script>
		-->
	</head>
	<body>
	
    <form action="index.php?controle=utilisateur&action=ident" method="post">
		Login <input name="login" 
                             value="" /> 
		Pass <input type= "password" name= "pass" 
                             value="" />  
		<input class="btn btn-primary" type= "submit" value= "ok" />                       
    </form>
	
    <form action="index.php?controle=utilisateur&action=actionstart" method="post">
		 <input type="submit" name="login" value="Retour" />                       
    </form>
            
	<div >  </div>   	   
	</body></html>
