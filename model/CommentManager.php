<?php
class CommentManager 
{
	public function getComments($postId)
	{

		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, id_post_blog, id_member, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id_post_blog = ? ORDER BY comment_date DESC');
	 	$comments->execute(array($postId));

	 	return $comments;
	}

 	public function postComment($postId, $memberId, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(id_post_blog, id_member, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $memberId, $comment));

        return $affectedLines;
    }

    private function dbConnect()
	{
		$db = new PDO('mysql:host=localhost;dbname=blog_jean_forteroche;charset=utf8', 'root', ''); 
		return $db;
	}
}