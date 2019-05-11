<?php
function getPosts()
{
 try
 {
    $db = new PDO('mysql:host=localhost;dbname=blog_jean_forteroche;charset=utf8', 'root', '');

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

function getPost($postId)
{
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=blog_jean_forteroche;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	$req = $db->prepare('SELECT id, blog_post_title, blog_content, DATE_FORMAT(blog_post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS blog_post_date_fr FROM blog_posts WHERE id = ?');
	$req->execute(array($postId));
	$post = $req->fetch();

	return $post;
}

function getComments($postId)
{
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=blog_jean_forteroche;charset=utf8', 'root', ''); 
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	 $comments = $db->prepare('SELECT id, id_post_blog, id_member, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id_post_blog = ? ORDER BY comment_date DESC');
	 $comments->execute(array($postId));

	 return $comments;
}
