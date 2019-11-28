<?php $title ='Commentaires';?>
<?php ob_start(); ?>
      <div class="row backhome">
        <div class="col s12">
          <p class="backhome-button">
            <a href="index.php" class="waves-effect waves-light btn blue"  >Retour à la liste des billets</a>
          </p>
        </div>
      </div>  
      <div class="container">
        <div class="row">
            <h4 class="chapter-title">
              <p class=" center-align">
              Chapitre&nbsp;<?= $_GET['id']; ?>&nbsp;:&nbsp;
              <?= $post['post_title'] ?>
              </p>
            </h4>
            <hr />
              <div class="news">
                <em> mis en ligne le <?= $post['post_date_fr'] ?></em>
              </div>
            <hr class="element-1">
          <div class="post-wrapper">
              <p class="post">
                    <?= nl2br(htmlspecialchars($post['blog_content'])) ?>
              </p>
                <p class="signature">Jean Forteroche</p>       
          </div>
        </div>
      </div>
        <div class="container">
        <div class="container comments-field">
          <div class="comment-space">
          <h4 class="comment-space-title">Espace des commentaires</h4>

          <?php $nbComment = $nbComments->fetch();?>
          <h5 class="comment-number"><i class="fa fa-comments" aria-hidden="true"></i>
            <?= htmlspecialchars($nbComment['nombreComments']) ?> Commentaire<?php if ($nbComment['nombreComments'] >1) echo 's';?>
          </h5>
          <p class="no-comment">
            <?php if ($nbComment['nombreComments'] == 0) echo "Aucun commentaire n'a été publié... Soyez le premier !";?>
          </p>
          </div>
        </div>
      </div>
  <?php 
        while ($comment = $comments->fetch())
        if (isset($_SESSION['pseudo']) || empty($_SESSION))
          { ?>
        <div class="container">
        <p class="comment-user">
          <strong><?= htmlspecialchars($comment['pseudo']) ?></strong>
        </p>
        <p class="comment-date">
            a écrit le : <?= $comment['comment_date_fr'] ?>
        </p>
        <p class="comment-comment">
            <?= nl2br(htmlspecialchars($comment['comment'])) ?>
        </p>
        </div>
          <div class="container">
            <!-- Modal Trigger -->
            <a class="modal-trigger" href="#modal1">Signaler le commentaire</a>

             <!-- Modal Structure -->             
            <div id="modal1" class="modal">
              <div class="modal-content">
                <h4> Signalement d'un commentaire </h4>
              <p>
                 Êtes vous sûr de vouloir signaler ce commentaire à notre administrateur ?
              </p>
              <div class="modal-footer">
                <a class="modal-close btn-flat">Annuler</a>
                <a href="index.php?action=reporting&id=<?= $comment['id'] ?> "class="modal-close btn-flat">Confirmer</a>
              </div>
          </div>
        </div>
        </div>
  <?php 
        }
          ?>

  <?php if(!empty($_SESSION))
        { 
          $id = $_GET['id'];
          if(strpos($id, "#modal1")!=false) {

            $id = substr($id, 0,strpos($id, "#modal1"));
          }

          ?>
        <div class="container">
          <div class="comments-form" >
            <h4 class="left">Ajouter un commentaire : </h4>
            <br />
            <form action="index.php?action=addComment&amp;id=<?php echo $id ?>" method="post">
              <br />
              <textarea id="comment" name="comment" class="materialize-textarea"  data-length="120" placeholder="Saisir votre commentaire ici..."></textarea>
              <br />
              <button class="btn waves-effect waves-teal">Publier</button>
            </form>
          </div>
        </div>
        <br />

  <?php
        }
        ?>
      </div>

  <?php if(isset($_SESSION) && empty($_SESSION)) 
        {
      ?>
        
      <div class="container">
        <div class="row comment-chapter">
          <hr />
          </div>
          <h4 class="comment-post-title center-align">Commentez ce chapitre</h4>
          <div class="text-center text-info">
            <p class="center-align">
              Afin d'afficher le(s) commentaire(s) et de commenter ce chapitre. Connectez vous !        
            </p>
            <p class="center-align">
              <a class="waves-effect waves-light btn-large" href="index.php?action=login" role="button">Loggin</a>
              <a class="waves-effect waves-light btn-large" href="index.php?action=signup" role="button">Register</a>
            </p>

          </div>
        
      </div>

  <?php
        } 
      ?>
      </div>
      <?php 
      $content = ob_get_clean(); 
  ?>

  <?php 
      require('view/frontend/template_2.php'); 
  ?>

