<?php
require_once('include/config.php');
 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="./content/main_style.css" /> -->
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
<?php
// Récupération du billet
$req = $bdd->prepare('SELECT id, blog_post_title, blog_content, DATE_FORMAT(blog_post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS blog_post_date_fr FROM blog_posts WHERE id = ?');
$req->execute(array($_GET['blog_post']));
$data = $req->fetch();
?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($data['blog_post_title']); ?>
        <em>le <?php echo $data['blog_post_date_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    echo nl2br(htmlspecialchars($data['blog_content']));
    ?>
    </p>
</div>
<hr>
<div class="container">
  <h3>Laisser un commentaire</h3>
  <div class="row">
  <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="pseudo">Pseudo:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="pseudo" placeholder="Votre pseudo" name="pseudo">
      </div>
    </div>
    <div class="form-group">
  <label class="control-label col-sm-2" for="comment">Commentaire:</label>
  <div class="col-sm-10">
  <textarea class="form-control" rows="5" id="comment" placeholder="Veuillez laisser votre commentaire ici..."></textarea>
  </div>
</div>
    <div class="form-group">         
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Soumettre</button>
      </div>
    </div>
  </form>
</div>
</div>

<?php 
$req = $bdd->prepare("SELECT COUNT(id_post_blog) AS NbComments FROM comments inner join members on members.id = comments.id_member AND comments.id_post_blog = ?");
$req->execute(array($_GET['blog_post']));
$data = $req->fetch();
$req->closeCursor();
?>

<h3><i class="fa fa-comments" aria-hidden="true"></i><?php echo htmlspecialchars($data['NbComments']); ?> Commentaire</h3>
<hr>
<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $bdd->prepare('SELECT members.pseudo, comments.comment, DATE_FORMAT(comments.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments inner join members on members.id = comments.id_member WHERE comments.id_post_blog = ? ORDER BY comment_date');
$req->execute(array($_GET['blog_post']));

while ($data = $req->fetch())
{
?>
<p><strong><?php echo htmlspecialchars($data['pseudo']); ?> </strong><i>a écrit</i> le <?php echo $data['comment_date_fr']; ?></p>

<p><?php echo nl2br(htmlspecialchars($data['comment'])); ?></p><hr>
<?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>
 </div>
</div>
</body>
</html>