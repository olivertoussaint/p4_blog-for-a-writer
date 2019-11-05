	<?php 
	$title = 'Modifier un billet'; 
	?>

	<?php ob_start(); ?>
	<div>
		<h3 class="edit-post-title">Modifier le post</h3>
	</div>

	<div id="admin-page"></div>
	<div class="container login-form">
		<form action="index.php?action=postUpdate&id=<?= $_GET['id'];?>" method="POST">
	    	<div class="col-lg-12"></div>
	    	<div class="col-lg-4">	        
	        	<div class="form-group">
	            	<label for="title">Titre</label>
	            <div>
	                <input type="text" name="post_title" id="post_title" value="<?= $post['post_title'];?> " />
	            </div>
	        	</div>
	        	<div class="form-group">
	            	<label for="content">Chapitre à modifier</label>
	            		<div>
	                		<textarea name="mytextarea" id="mytextarea"><?= nl2br($post['blog_content']);?></textarea>
	            		</div>
	        	</div>

	        	<div class="form-group">
	            	<div class="container">
	                	<button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
	                		<a href="index.php?action=administration" class="btn btn-info" role="button">Retour sur le tableau de bord</a>
	            	</div>
	        	</div>
	   		</div>
		</form>
	</div>

	<?php $content = ob_get_clean(); ?>

	<?php require('view/backend/template_text.php'); ?>