<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />

      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="" />
      <meta name="author" content="" />
      <!-- Favicon -->
      <link rel="icon" href="public/images/favicon.ico" />

      <title><?= $title ?></title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>      
      
      <link href="./public/css/main_style.css" rel="stylesheet" />

      <!-- Tinymce -->
    <script src="public/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            mode : "textareas",
            editor_selector : "mceEditor"
        });
    </script>
   </head>

   <body>
   <div class="container-fluid">
   <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                       
      </button>
      <a class="navbar-brand brand" href="#"><img src="./public/images/Logo_projet_4.png" alt="Logo" title="Logo Jean Forteroche"></a>
    </div>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
                    <li><a class="active" href="index.php"><i class="fa fa-home fa-lg" aria-hidden="true"></i> Home<span class="sr-only">(current)</span></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                     <?php
                     if(isset($_SESSION) && empty($_SESSION)) {
                     ?> 
                      <li><a href="index.php?action=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                      <?php
                     }
                     ?>
                     <?php
                     if(isset($_SESSION) && !empty($_SESSION))
                     {
                        ?>
                      <li><a href="index.php?action=signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> 
                      <li><a href="index.php?action=signup"><span class="glyphicon glyphicon-user"></span> Deconnect</a></li>
                      <?php
                     }
                     ?> 
                   </ul>
                 </div>
  </div>
</nav>
</div>
<div>
      <?= $content ?> 
 </div>         
   </body>

   <footer class="container-fluid footer">
            <div class="row">
                <div class="col-sm-4 footer image-responsive">
                    <p><img src="./public/images/Logo_projet_4.png" alt="Logo" title="Logo Jean Forteroche"></p>
                </div>
                <div class="col-sm-4 social-icons">
                    <h3 class="footer-text">Restons connecté</h3>
                    <a href="#" class=" fa fa-facebook fa-2x"></a>
                    <a href="#" class=" fa fa-twitter fa-2x"></a>
                    <a href="#" class=" fa fa-google fa-2x"></a>
                    <a href="#" class=" fa fa-linkedin fa-2x"></a>
                </div>
                <div class="col-sm-4 ">
                    <h3 class="footer-text">Me contacter</h3>
                </div>
            </div>
            <hr class="footer-separate" />
<div class="container-fluid">
            <div class="footer-copyright">
                               
                   <p class="copyright-text"> © 2019 Jean FORTEROCHE - Billet simple pour L'Alaska - Projet N°4 - Cursus DWJ Openclassrooms | Mentions Légales </p>
                </div>
            </div>  
        </footer>
</html>