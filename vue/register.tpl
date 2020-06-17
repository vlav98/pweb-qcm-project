<!doctype html>
	<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>authentification - 2 fichiers</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
		<!-- 	
			<script src="script.js"></script>
		-->
	</head>
	<script type="text/javascript">
		function radiobutton() {
				if (document.getElementById('rEtu').checked) {
					document.getElementById('mlle').disabled = false;
					document.getElementById('mme').disabled = false;
					document.getElementById('mr').disabled = false;
					document.getElementById('groupe').disabled = false;
					document.getElementById('matricule').disabled = false;
				}
				if (document.getElementById('rProf').checked) {
					document.getElementById('mlle').disabled = true;
					document.getElementById('mme').disabled = true;
					document.getElementById('mr').disabled = true;
					document.getElementById('groupe').disabled = true;
					document.getElementById('matricule').disabled = true;
				}
		}
	</script>
	<body>
	
	<div class="container">
		<div class="row col-sm-offset-3 col-sm-6">
			<form id='register' action="index.php?controle=register&action=save" method="post">
			<fieldset>
			<legend> Qui êtes-vous ? </legend>
			<INPUT type= "radio" name="role" id="rEtu" value="etudiant" onclick="radiobutton()"> Étudiant<br/>
			<INPUT type= "radio" name="role" id="rProf" value="professeur" onclick="radiobutton()"> Professeur<br/>
			</fieldset>
			
			
			
			<fieldset>
			<legend> Genre </legend>
			<INPUT type= "radio" name="genre" id="mlle" value="F"> Mlle<br/>
			<INPUT type= "radio" name="genre" id="mme" value="F"> Mme<br/>
			<INPUT type= "radio" name="genre" id="mr" value="M"> Mr<br/>
			</fieldset>
			
			
			
			<div class="form-group">
			<label>Nom: 
			<input type="text" name="nom"/></label><br/>
			</div>
			
			<div class="form-group">
			<label>Prénom: 
			<input type="text" name="prenom"/></label><br/>
			</div>
			
			<div class="form-group">
			<label>Adresse e-mail: 
			<input type="mail" name="email"/></label><br/>
			</div>
			
			<div class="form-group">
			<label>Login: 
			<input type="text" name="login"/></label><br/>
			</div>
			
			<div class="form-group">
			<label>Mot de passe: 
			<input type="password" name="pass"/></label><br/><p>Votre mot de passe doit contenir au minimum 6 caractères, 1 majusule et 1 chiffre</p>
			</div>
			
			<div class="form-group">
			<label>Confirmation du mot de passe: 
			<input type="password" name="pass2"/></label><br/>
			</div>
			
			
			
			<div class="form-group">
			<label>Groupe: 
			<SELECT name="groupe" id="groupe">
			<?php 
				if($grpe!=false){
					foreach($grpe as $v){
					echo( '<option value="'.$v["id_grpe"].'">'.$v["num_grpe"].'</option>'); 
					}
				
				}
			?>
			</SELECT>
			</div>
			
			<div class="form-group">
			<label>Matricule: 
			<input type="text" name="matricule" id="matricule"/></label><br/>
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Valider</button>
			</div>
			</form>
		</div>
	</div>
	<form action="index.php?controle=utilisateur&action=actionstart" method="post">
	<button type="submit" class="btn btn-primary">Retour</button>
	</form>
	</body>
	
	
</html>