<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=blog_jean_forteroche;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$req = $bdd->query('SELECT id, blog_post_title, blog_content, DATE_FORMAT (blog_post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS blog_post_date_fr FROM blog_posts ORDER BY id DESC LIMIT 0,5');

require('affichageAccueil.php');
?>