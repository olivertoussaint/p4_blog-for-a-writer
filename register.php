<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
    input:focus {
     background-color: azure;
    }
    </style>
    <link rel="stylesheet" href="./public/css/main_style.css" />
	<title>Formulaire d'inscription</title>
</head>
<body>
	<div class="container">
        <div class="form-position">
		<div class="col-lg-4 col-md-4"></div>
		<div class="col-lg-4 col-md-4">
			<h5 class="card-header">Vous êtes un nouveau membre ?</h5>
			<div class="jumbotron">
				<form action="config.php" method="POST">
					<div class="form-group">
						<label for="pseudo" title="Pseudo"><span class="required">*</span> Pseudo</label><br />
						<input type="text" name="pseudo" id="pseudo" required />						
					</div>
					<div class="form-group">
						<label for="email_1" title="adresse email"><span class="required">*</span> Adresse email</label><br />
						<input type="email" name="email_1" id="email_1" required />						
					</div>
					<div class="form-group">
						<label for="email_2" title="confirmer adresse email"><span class="required">*</span> Confirmez l'adresse email</label><br />
						<input type="email" name="email_2" id="email_2" required />						
					</div>
					<div class="form-group">
						<label for="password_1"><span class="required">*</span> Mot de passe</label><br />
						<input type="password" name="password_1" id="password_1" required />						
					</div>
					<div class="form-group">
						<label for="password_2"><span class="required">*</span> Confirmez le mot de passe</label><br />
						<input type="password" name="password_2" id="password_2" required />						
					</div>
					<div class="col-md-4"></div>
					<button type="submit" class="btn btn-primary" name="form_registration" title="Créer votre compte"><span class="glyphicon glyphicon-user">&nbsp;</span>Créer mon compte</button>
				</form>
				<p><span class="required">* champ requis</span></p>
			</div>
				</div>
        <div class="col-lg-3 col-md-4"></div>
        <div class="col-lg-3 col-md-4">
        	<h5 class="card-header">Espace membre <br /><hr class="hr" />
        	Merci de vous identifier</h5>       	
            <div class="jumbotron">
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <label for="pseudo" title="pseudo"><span class="required">*</span> Pseudo</label><br />
                        <input type="text" name="pseudo" id="pseudo_member" required />                      
                    </div>
                    <div class="form-group">
                        <label for="password_1" title="mot de passe"><span class="required">*</span> Mot de passe</label><br />
                        <input type="password" name="password_1" id="password_member" required />
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="form_connection" title="Connectez-vous"><span class="glyphicon glyphicon-user">&nbsp;</span>Connexion</button> 
                </form>
                <p><span class="required">* champ requis</span></p>
            </div>
                <p class="back_home"><a href="index.php" title="retour à la page d'accueil"><span class="glyphicon glyphicon-home"> Back to the homepage</span></a></p>
        </div>
</div>
</div>
				<?php
				if(isset($erreur))
				{
					echo $erreur;
				}
				?>	
</body>
</html>