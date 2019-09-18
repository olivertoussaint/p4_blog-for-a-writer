<?php
 require_once('model/PostManager.php');
 require_once('model/CommentManager.php');
 require_once('model/RegisterManager.php');

 function listPosts()
 {
 	$postManager = new PostManager(); // Création d'un objet
 	$posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
	$postManager = new PostManager(); // Création d'un objet
	$commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $memberId, $comment)
{
	$postManager = new PostManager(); // Création d'un objet

    $affectedLines = $commentManager->postComment($postId, $memberId, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function signUp($pseudo, $email, $pass_hache)
{
	 $registerManager = new RegisterManager();
	 $newMember = $registerManager->newMemberLogin($pseudo, $email, $pass_hache);
	
	 require('view/frontend/registerView.php');
}

function authentification()
{
	$authentificationManager = new AuthentificationManager();
	$login = $authentificationManager->CheckUser();

	require('view/frontend/connectView.php');
}

function signupForm()
{

 require('view/frontend/registerView.php');
	
}