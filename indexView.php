<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="./public/css/main_style.css" />
      <title>Personnal Blog of Jean Forteroche</title>
   </head>
   <body>
      <div id="home">
         <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="./images/Logo_projet_4.png"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse-main">
                    <ul class="nav navbar-nav">
                        <li><a class="active" href="index.php"><i class="fa fa-home fa-lg" aria-hidden="true"></i> Home<span class="sr-only">(current)</span></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Connection <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="center-element-1" title="Créer un compte membre">New member ?</li>
                                <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="center-element-2" title="Espace membre">Member access</li>
                                <li><a href="register.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->  
            </div>
            <!-- /.container-fluid -->
        </nav>
         <div class="landing-text">
            <h1 class="main-title">Billet simple pour L'alaska</h1>
         </div>
      </div>
      <div class="container">
         <div class="row">
            <h2>Les derniers épisodes</h2>
            <hr class="separate">
            <div class="col-sm-6 col-sm-offset-3">
            <?php            
               while ($data = $req->fetch())       
               {
            ?>
            <div class="news">
               <h3>
                  <?php echo htmlspecialchars($data['blog_post_title']); ?>
                  <em>le <?php echo $data['blog_post_date_fr']; ?></em>
               </h3>
               <p>
                  <?php
                     $lg_max = 500;
                     $blog_content = $data['blog_content'];
                     $blog_content = strip_tags($blog_content);
                     if (strlen($blog_content) > $lg_max) {
                       $blog_content = substr($blog_content,0, $lg_max);
                       $last_space = strripos($blog_content, " ");
                       $blog_content = substr($blog_content,0, $last_space)." [...]";
                     }
                     echo $blog_content;   
                  ?>
                  <br />
                  <br />
                  <strong><a href="comments.php?blog_post=<?php echo $data['id']; ?>" class="btn btn-success">Lire la suite</a></strong>
               </p>
            
            <div class="comment">
               <em><a href="comments.php?blog_post=<?php echo $data['id']; ?>">Commentaires</a></em>
            </div>
            </div>
            <?php
               }
               $req->closeCursor();
            ?>
         </div>
         </div>
      </div>
      <footer class="container-fluid text-center">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Mentions Légales</h3>
                </div>
                <div class="col-sm-4" class="social-icons">
                    <h3>Restons connecté</h3>
                    <a href="#" class=" fa fa-facebook fa-2x"></a>
                    <a href="#" class=" fa fa-twitter fa-2x"></a>
                    <a href="#" class=" fa fa-google fa-2x"></a>
                    <a href="#" class=" fa fa-linkedin fa-2x"></a>
                </div>
                <div class="col-sm-4">
                    <h3>Me contacter</h3>
                </div>
            </div>
        </footer>
        <button onclick="topFunction()" id="myBtn" title="Haut de page"><i class="fa fa-arrow-up fa-2x" aria-hidden="true"></i></button>
        <script src="./js/scrollToTop.js"></script>
   </body>
</html>