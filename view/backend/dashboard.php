<?php
ob_start(); 
?>
		<div class="row">
				<h2>Tableau de bord</h2>
			<div class="row">
				<div class="col s12">
					<a href="index.php" class="btn-floating teal lighten-1 pulse"><i class="material-icons">home</i></a>
					<a href="index.php?action=logout" class=" blue-grey-text text-darken-3 right" title="Se déconnecter"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;D&eacute;connexion</i></a>
				</div>
			</div>
		</div>
	<div class="row">
		<?php include('public/template/dashboardNav.php'); ?>
	</div>

<?php
	$content = ob_get_clean();

	$title = "Jean Forteroche - Administration";

	require('view/backend/template.php');
?>
