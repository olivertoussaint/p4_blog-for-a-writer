<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./public/css/style.css" />
        <?php $title ='Commentaires'; ?>
    </head>
        
    <body>
        <div class="container-fluid">
        <div class="row">
        <?php ob_start(); ?>
    <p class="backHome"><a href="index.php" class="btn btn-primary"  >Retour à la liste des billets</a></p>
    </div>
    </div>
    <div class="container">
        <div class="row">       
    <h3>Article</h3>
    <hr>
        <div class="news">
            <h3>
                <?= htmlspecialchars($post['blog_post_title']) ?>
                <em>le <?= $post['blog_post_date_fr'] ?></em>
            </h3>
            <hr class="element-1">
            <p class="post">
                <?= nl2br(htmlspecialchars($post['blog_content'])) ?>
            </p>
        </div>
        <hr class="element-1">
        <h2>Espace des commentaires</h2>
        <hr class="element-2">
        <h4><i class="fa fa-comments" aria-hidden="true"></i> Commentaires</h4>

        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" />
            </div>
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment" rows="4" cols="50" placeholder="Merci de laisser votre commentaire ici ..."></textarea>
            </div>
            <div>
                <input type="submit" value="Soumettre votre commentaire" />
            </div>
        </form>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
        <hr>
        <div class="comment-content">
            <p><strong><?= htmlspecialchars($comment['id_member']) ?></strong> a écrit le : <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        </div>    
        <?php
        }
        ?>
        <?php $content = ob_get_clean(); ?>

        <?php require('template.php'); ?>

      </div>
    </div>
    </body>
</html>