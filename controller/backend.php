	<?php
	require_once('model/PostManager.php');
	require_once('model/CommentManager.php');
	require_once('model/UserManager.php');

	function administration()
	{
		$postManager = new \Blog\JeanForteroche\Model\PostManager();
		$commentManager = new \Blog\JeanForteroche\Model\CommentManager();
		$posts = $postManager->getPosts();
		$comments = $commentManager->getReporting();
		require('view/backend/dashboard.php');
	}

	function getColor($table, $colors)
	{
		if(isset($colors[$table])){
			return $colors[$table];
		} else {
			return "orange";
		}
	}

	function displayUpdate() 
	{
		$postManager = new \Blog\JeanForteroche\Model\PostManager();
		$post = $postManager->getPost($_GET['id']);
		require('view/backend/editPost.php');
	}

	function updatedPost($title, $content, $id) 
	{
		$postManager = new \Blog\JeanForteroche\Model\PostManager();	
		$updatedPost = $postManager->updatePost($title, $content, $id);
	}

	function createPost() 
	{
		require('view/backend/createPost.php');
	}

	function newPost($title, $content)
	{
		$postManager = new \Blog\JeanForteroche\Model\PostManager();
		$newPost = $postManager->createPost($title, $content);

		header('Location: index.php?action=administration');
	}

	function removePost($postId)
	{
		$postManager = new \Blog\JeanForteroche\Model\PostManager();
		$deletedPost = $postManager->deletePost($postId);

		header('Location: index.php?action=administration');
	}

	function removeComment($commentId)
	{
		$commentManager = new \Blog\JeanForteroche\Model\CommentManager();
		$deletedComment = $commentManager->deleteComment($commentId);

		header('Location: index.php?action=administration');
	}

	function approveComment($postId)
	{
		$commentManager = new \Blog\JeanForteroche\Model\CommentManager();
		$approvedComment = $commentManager->validatecomment($postId);
	}

