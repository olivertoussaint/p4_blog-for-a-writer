    <?php
    require_once('model/PostManager.php');
    require_once('model/CommentManager.php');
    require_once('model/UserManager.php');

    function listPosts()
    {
        $postManager = new \Blog\JeanForteroche\Model\PostManager();
        $posts = $postManager->getPosts();
        
        require('view/frontend/listPostsView.php');
    }

    function post()
    {
        $postManager = new \Blog\JeanForteroche\Model\PostManager();
        $commentManager = new \Blog\JeanForteroche\Model\CommentManager();  
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
        $nbComments = $commentManager->countNumberComments($_GET['id']);
        $posts = $postManager->getPosts();
        require('view/frontend/postView.php');
    }

    function addComment($postId, $memberId, $comment)
    {
        $commentManager = new \Blog\JeanForteroche\Model\CommentManager();
        $affectedLines  = $commentManager->postComment($postId, $memberId, $comment);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
        
        require('view/frontend/postView.php');
    }

    function postReport($postId)
    {
      $commentManager = new \Blog\JeanForteroche\Model\CommentManager();
      $reportedComment = $commentManager->reporting($postId);

      header('Location: index.php');
    }

    function login()
    {
        require('view/frontend/loginView.php');
    }

    function register()
    {
        require('view/frontend/registerView.php');
    }

    function addMember($pseudo, $pass, $mail) 
    {
        $userManager = new \Blog\JeanForteroche\Model\UserManager();
        $pseudoChecked = $userManager->checkPseudo($pseudo);
        $emailChecked = $userManager->checkMail($mail);
        if ($pseudoChecked) {
            header('Location: index.php');   
        }
        if ($emailChecked) {
            header('Location: index.php');
        }
        if (!$pseudoChecked && !$emailChecked) {
            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);            
            $newMember = $userManager->createMember($pseudo, $mail, $pass);
        }   
    } 

    function loginSubmit($pseudo, $pass) 
    {
        $userManager = new \Blog\JeanForteroche\Model\UserManager(); 
        $member = $userManager->loginMember($pseudo);
        $isPasswordCorrect = password_verify($_POST['password'], $member['password']);
        if (!$member) {
            header('Location: index.php');
        } else {
         if ($isPasswordCorrect) {
            $_SESSION['id'] = $member['id'];
            $_SESSION['pseudo'] = ucfirst(strtolower($pseudo));
            $_SESSION['role'] = $member['role'];
            header('Location: index.php');
            echo 'Bienvenu(e) ' . $_SESSION['pseudo'];
        } else {
            header('Location: index.php');
        }
    }
    }

    function aboutMe()
    {
        require('view/frontend/aboutMe.php');
    }

    function logout()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location: index.php");
    }

    function countComments($postId)
    {
        $commentManager = new \Blog\JeanForteroche\Model\CommentManager(); 
        $nbrComments = $commentManager->countNumberComments($postId);
        
        require('view/frontend/postView.php');
    }

    function mentionsLegales()
    {
        require('view/frontend/mentionsLegales.php');
    }

    function error()
    {
        require('view/frontend/errorView.php');
    }
