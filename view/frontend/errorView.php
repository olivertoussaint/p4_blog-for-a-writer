	<?php 
	$title = 'Page 404 Erreur'; 
	?>

	<?php ob_start(); ?>
	<div class="jumbotron text-center">
	<h1 class="error">Oups... Une erreur s'est produite !</h1>
	<p><?php echo $errorMessage ?></p>
	<img class="img-responsive img-error" src="public/images/img-404-error.PNG"
	     alt="Image d'erreur 404 page n'existe pas." />
	<br />
	<h4><a href="index.php" title="Accueil">Revenir à l'accueil du site</a></h4>


	<?php $content = ob_get_clean(); ?>
	</div>

	<?php require('view/frontend/template_3.php'); ?>