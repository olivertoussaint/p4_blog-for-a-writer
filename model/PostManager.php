<?php
class PostManager 
{
	public function getPosts()
	{
 		$db = $this->dbConnect();
    	// on récupère les posts
    	$req = $db->query('SELECT id, blog_post_title, blog_content, DATE_FORMAT (blog_post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS blog_post_date_fr FROM blog_posts ORDER BY id DESC LIMIT 0,5');

		return $req;
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, blog_post_title, blog_content, DATE_FORMAT(blog_post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS blog_post_date_fr FROM blog_posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	private function dbConnect()
	{
		$db = new PDO('mysql:host=localhost;dbname=blog_jean_forteroche;charset=utf8', 'root', ''); 
		return $db;
	}
}