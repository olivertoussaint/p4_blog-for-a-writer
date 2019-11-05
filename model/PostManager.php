<?php
namespace Blog\JeanForteroche\Model;
require_once("model/DatabaseManager.php");

class PostManager extends DatabaseManager 
{
	public function getPosts()
	{
 		$db = $this->dbConnect();
    	$req = $db->query('SELECT id, post_title, blog_content, image, DATE_FORMAT (post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS post_date_fr FROM blog_posts ORDER BY id DESC LIMIT 0,15');

		return $req;
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, post_title, blog_content, image, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS post_date_fr FROM blog_posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

    public function updatePost($title, $content, $id) 
    {
        $db = $this->dbConnect();
        $updatePost = $db->prepare('UPDATE blog_posts SET post_title = ?, blog_content = ?, post_date = NOW() WHERE id = ?');
        $updatedPost = $updatePost->execute(array($title, $content, $id));

        return $updatedPost;
    }

    public function createPost($title, $content)
    {
        $db = $this->dbConnect();
        $createPost = $db->prepare('INSERT INTO blog_posts (post_title, blog_content, post_date) VALUES ( ?, ?, NOW())');
        $newPost = $createPost->execute(array($title, $content));

        return $newPost; 
    }

	public function deletePost($postId)
	{
		$db = $this->dbconnect();
        $req = $db->prepare('DELETE FROM blog_posts WHERE id = ?');
        $deletedPost = $req->execute(array($postId));

        return $deletedPost;
	}	
}