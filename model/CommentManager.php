<?php
namespace Blog\JeanForteroche\Model;
require_once("model/DatabaseManager.php");

class CommentManager extends DatabaseManager
{
    public function getComments($postId)
    {
        
        $db = $this->dbConnect();
        // Récupération des commentaires
        $req = $db->prepare('SELECT comments.id, members.pseudo, comments.comment, DATE_FORMAT(comments.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments inner join members on members.id = comments.id_member WHERE comments.id_post_blog = ? ORDER BY comment_date');
        $req->execute(array(
            $postId
        ));

        return $req;
    }
    
    public function postComment($postId, $memberId, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(id_post_blog, id_member, comment, comment_date, flagged ) VALUES(?, ?, ?, NOW(),0)');
        $affectedLines = $comments->execute(array(
            $postId,
            $memberId,
            $comment
        ));
        
        return $affectedLines;       
    }

     public function deleteComment($commentId) 
     {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $deletedComment = $req->execute(array($commentId));

        return $deletedComment;
     } 


     public function deleteCommentPost($postId)
     {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id_post_blog = ?');
        $deletedCommentPost = $req->execute(array($postId));

        return $deletedCommentPost;
     }  

    public function reporting($postId)
    {
        $db = $this->dbconnect();
        $req = $db->prepare('UPDATE comments SET flagged = 1 WHERE id = ?');
        $reportedComment = $req->execute(array($postId));

        return $reportedComment;
    }

    public function validatecomment($postId)
    {
        $db = $this->dbconnect();
        $req = $db->prepare('UPDATE comments SET flagged = 0 WHERE id = ?');
        $validatedcomment = $req->execute(array($postId));

        return $validatedcomment;
    }

    public function getReporting()
    {
      $db = $this->dbConnect();  
      $reportComment = $db->prepare('SELECT * FROM comments WHERE flagged > 0');
      $reportComment->execute();

      return $reportComment; 

    }

    public function countNumberComments($postId)
    {
        $db = $this->dbConnect();
        $nbrComments = $db->prepare('SELECT COUNT(*) AS nombreComments FROM comments WHERE id_post_blog = ?');
        $nbrComments->execute(array($postId));
        
        return $nbrComments;        
    } 
} 