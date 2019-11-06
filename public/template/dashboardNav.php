	<?php
			$tables = [

	 			"Publications"    => "blog_posts",
	 			"Commentaires"    => "comments",
	 			"Membres" => "members"
			];

			$colors = [
				"blog_posts" => "green",
				"comments" => "red",
				"members" => "blue",
			];

	?>
			<?php
	        $UserManager = new \Blog\JeanForteroche\Model\UserManager();	 	
				foreach ($tables as $table_name => $table) {
			?>
			<div class="col l4 m6 s12">
				<div class="card">
					<div class="card-content <?= getColor($table,$colors)?> white-text">
						<span class="card-title"><?= $table_name ?></span>
			<?php 
				$nbrIntable = $UserManager->inTable($table);
		 	?>
						<h4><?= $nbrIntable['COUNT(id)'] ?></h4>
					</div>
				</div>
			</div>
			<?php		
		}
	?>
			<h4 class="center-align">Commentaire(s) signalé(s)</h4>
			
		<?php
	?>
		<table class="centered">
			<thead>
				<tr>
					<th>Article</th>
					<th>Commentaire</th>
					<th>Actions</th>
				</tr>
			</thead>
				<tbody>
			<?php
			if(!empty($comments)) {

			foreach ($comments as $comment) {

				?>
				<tr class="z-depth-5">
					<td><?= $comment['id_post_blog'];?></td>
					<td><?= $comment['comment'];?></td>
					<td><a class="btn tooltipped" data-position="left" data-tooltip="valider le commentaire" href="index.php?action=validateComment&id=<?= $comment['id'] ?>" class="btn-floating btn-small wawes-effect wawes-light blue notifications_off"><i class="material-icons">notifications_off</i></a>
					<a class="btn tooltipped" data-position="right"  data-tooltip="Supprimer le commentaire" href="index.php?action=deleteComment&id=<?= $comment['id'] ?>"><i class="material-icons">delete</i></a>
				</td>
				</tr>
					<?php
			}
			?>
				</tbody>
		</table>

		<h3 class="center-align">Gestion des chapitres</h3>
		<div class="col l10 m6 s12">
			<h5 class="right-align">Ajouter un chapitre&nbsp;<a href="index.php?action=createPost" class="btn-floating waves-effect waves-light red right" title="Ajouter un chapitre"><i class="material-icons">add</i></a></h5>
		</div>
		<table class="striped">
			<thead>
				<tr>
					<th>Titre</th>
					<th class="center-align">Contenu</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach ($posts as $post) {
			?>
			<tr>
				<td><?= $post['post_title'];?></td>
					<td>
			<?php
				$lg_max = 240;
	      		$blog_content = $post['blog_content'];
	      		$blog_content = strip_tags($blog_content);
	      			if (strlen($blog_content) > $lg_max) {
	          			$blog_content = substr($blog_content, 0, $lg_max);
	         			$last_space   = strripos($blog_content, " ");
	          			$blog_content = substr($blog_content, 0, $last_space) . " [...]";
	      			}
	       			echo $blog_content;     
	  		?>      
					</td>
				<td>
					<a href="index.php?action=updatePost&id=<?php echo $post['id'];?>" class="btn-floating btn-small wawes-effect wawes-light blue modal-trigger"><i class="material-icons">edit</i></a>

					<!-- Modal Trigger -->
            		<a class="wawes-effect wawes-light red delete_comment btn-floating btn-small modal-trigger" href="#modal1"><i class="material-icons">delete</i></a>
					
					 <!-- Modal Structure -->             
            	<div id="modal1" class="modal">
              		<div class="modal-content">
                	<h4> Suppression du chapitre </h4>
              		<p>
                 		Êtes vous sûr de vouloir supprimer ce chapitre ?
              		</p>
              		<div class="modal-footer">
                		<a class="modal-close btn-flat">Annuler</a>
                		<a href="index.php?action=deletePost&id=<?php echo $post['id'];?>" class="modal-close btn-flat">Confirmer</a>
              		</div>
          			</div>
        		</div>		
				</td>
			</tr>
					<?php
					}
				}else{
					?>
						<tr>
							<td></td>
							<td>Aucun commentaire à valider</td>
						</tr>
					<?php
				}
			?>
			</tbody>
		</table>

		<div class="backToHome">
	      <div class="row center">
	        <div class="col s12 ">
	        	<br />
	          <a href="index.php" class="btn-floating teal lighten-1 pulse"><i class="material-icons">home</i></a>
	        </div>
	      </div>
	    </div>