<?php
session_start();
require('controller/frontend.php');
require('controller/backend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            if(isset($_GET['page']) && is_numeric($_GET['page'])){
        $page_num = listPosts($_GET['page']);
    } else {
        throw new Exception('oups!!!');
    }
        
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();

            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_SESSION['id']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_SESSION['id'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs doivent être remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'login') {
            if (!isset($_SESSION['pseudo'])) {
                login();

            } else {
                header("Location: index.php");
                throw new Exception('Vous êtes déja connecté !');
            }
        } elseif ($_GET['action'] == 'signup') {
            signup();

        } elseif ($_GET['action'] == 'register') {
            register();

        } elseif ($_GET['action'] == 'verifUser') {
            verifUser();

        } elseif ($_GET['action'] == 'createUser') {
            createUser();

        } elseif ($_GET['action'] == 'forgetPass') {
            forgetPass();

        } elseif ($_GET['action'] == 'resetPass') {
            resetPass();

        } elseif ($_GET['action'] == 'updatePass') {
            updatePass();

        } elseif ($_GET['action'] == 'logout') {
            logout();

        } elseif ($_GET['action'] == 'reporting') {
            reporting();

        } elseif ($_GET['action'] == 'administration') {
            if (isset($_SESSION['pseudo']) && ($_SESSION['role'] == '1')) {
                administration();

            } else {
                header("Location: index.php");
                echo ('Vous n\'êtes pas autorisé à accéder à cette partie du site');
            } 

        } elseif ($_GET['action'] == 'newPost') {
            newPost();

        } elseif ($_GET['action'] == 'deletePost') {
           if (isset($_SESSION['pseudo']) && ($_SESSION['role'] == '1')) {
                deletePost();

            } else {
                header("Location: index.php");
                echo ('Vous n\'êtes pas autorisé à accéder à cette partie du site');
            }          
                } elseif ($_GET['action'] == 'flaggedOff') {
           if (isset($_SESSION['pseudo']) && ($_SESSION['role'] == '1')) {
                flaggedOff();

            } else {
                header("Location: index.php");
                echo ('Vous n\'êtes pas autorisé à accéder à cette partie du site');
            }          
                } elseif ($_GET['action'] == 'editPost') {
           if (isset($_SESSION['pseudo']) && ($_SESSION['role'] == '1')) {
                editPost();

            } else {
                header("Location: index.php");
                echo ('Vous n\'êtes pas autorisé à accéder à cette partie du site');
            }                   
             
        } elseif ($_GET['action'] == 'mentionsLegales') {
            mentionsLegales();

        }
    } else {
        listPosts();

    }
}
catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
    }