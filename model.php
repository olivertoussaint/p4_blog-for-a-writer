<?php
function getPosts()
{
 try
 {
    $db = new PDO('mysql:host=localhost;dbname=blog_jean_forteroche;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 }
 catch (Exception $e)
{
   // En cas d'erreur, on affiche un message et on arrête tout
         die('Erreur : ' . $e->getMessage());
 }
   // on récupère les posts
       $req = $db->query('SELECT id, blog_post_title, blog_content, DATE_FORMAT (blog_post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS blog_post_date_fr FROM blog_posts ORDER BY id DESC LIMIT 0,5');

return $req;
}
 ?>