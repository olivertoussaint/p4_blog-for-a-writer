<?php
session_start();
require('controller/frontend.php');
require('controller/backend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } 
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } 
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
            } 
            elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_SESSION['id']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_SESSION['id'], $_POST['comment']);
                } 
                else {
                throw new Exception('Tous les champs doivent être remplis !');
                }
            } else {
              throw new Exception('Aucun identifiant de billet envoyé');
            }  
        } 
        elseif ($_GET['action'] == 'register') {
                    register();

        } elseif ($_GET['action'] == 'login') {
            login();

        }  elseif ($_GET['action'] == 'addMember') {
                        if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])) {
                                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                            if ($_POST['password'] == $_POST['password_confirm']) {
                                                    addMember(strip_tags($_POST['pseudo']), strip_tags($_POST['password']), strip_tags($_POST['email']));
                                    }
                                    else {
                                            throw new Exception('Les deux mots de passe ne correspondent pas.');
                                    }
                            } else {
                                      throw new Exception('Pas d\'adresse email valide.');
                            }
                        } else {
                                  throw new Exception('Tous les champs ne sont pas remplis !');
                        }
                } 
                elseif ($_GET['action'] == 'loginSubmit') {
                         loginSubmit(strip_tags($_POST['pseudo']), strip_tags($_POST['password']));
                } 
                elseif ($_GET['action'] == 'aboutMe') {
                         aboutMe();
        } 
        elseif ($_GET['action'] == 'logout') {
            logout();
        } 
        elseif ($_GET['action'] == 'reporting') {
            postReport($_GET['id'], $_SESSION['pseudo']);
        } 
        elseif ($_GET['action'] == 'validateComment') {
            approveComment($_GET['id'], $_SESSION['pseudo']);
        } 
        elseif ($_GET['action'] == 'deleteComment') {
            removeComment($_GET['id']);
        } 
        elseif ($_GET['action'] == 'administration') {
                  if (isset($_SESSION['pseudo']) && ($_SESSION['role'] == '1')) {
                          administration();

                  } else {
                         throw new Exception('Vous n\'êtes pas autorisé à accéder à cette partie du site');
                         header("Location: index.php");
                          exit;             
                  } 
        } 
        elseif ($_GET['action'] == 'updatePost') {
                  if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (isset($_SESSION) && $_SESSION['role'] == '1') {
                               displayUpdate();
                        }  
        } else {
                        throw new Exception('Vous n\'êtes pas autorisé à accéder à cette partie du site');
            }
        }

        elseif ($_GET['action'] == 'displayUpdate') {
            if (isset($_SESSION['pseudo']) && ($_SESSION['role'] == '1')) {
                displayUpdate();

            } else {
                    throw new Exception('Vous n\'êtes pas autorisé à accéder à cette partie du site');
            }
        }

        elseif ($_GET['action'] == 'postUpdate') {
            if(isset($_GET['id'])&&($_GET['id'] > 0)) {

            updatedPost($_POST['post_title'], $_POST['mytextarea'], $_GET['id'] );
            }
        } 
        elseif ($_GET['action'] == 'createPost') {
            if (isset($_SESSION['pseudo']) && ($_SESSION['role'] == '1')) {
                createPost();

            } else {
                    throw new Exception('Vous n\'êtes pas autorisé à accéder à cette partie du site');
            }
        } 
        elseif ($_GET['action'] == 'submitPost') {
                if (!empty($_POST['title']) && !empty($_POST['mytextarea'])) {
                      newPost($_POST['title'], $_POST['mytextarea']);

                } else {
                        throw new Exception('Merci de remplir les champs demandés !');
                }
        } 
        elseif ($_GET['action'] == 'deletePost') {
                removePost($_GET['id']);
         
        }   
        elseif ($_GET['action'] == 'mentionsLegales') {
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