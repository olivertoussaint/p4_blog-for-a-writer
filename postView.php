<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <title>commentaires</title>
    </head>
        
    <body>
        <div class="container-fluid">
        <div class="row">
    <p><a href="index.php" class="btn btn-primary"  >Retour à la liste des billets</a></p>
    </div>
    </div>
    <div class="container">
        <div class="row">
        <h2>Espace des commentaires</h2>
    <h3>Article</h3>

        <div class="news">
            <h3>
                <?= htmlspecialchars($post['blog_post_title']) ?>
                <em>le <?= $post['blog_post_date_fr'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['blog_content'])) ?>
            </p>
        </div>
        <hr>
        <h4><i class="fa fa-comments" aria-hidden="true"><?= htmlspecialchars($data['NbComments']) ?></i> Commentaires</h4>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
        <hr>
            <p><strong><?= htmlspecialchars($comment['id_member']) ?></strong> a écrit le : <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <?php
        }
        ?>
      </div>
    </div>
    </body>
</html>