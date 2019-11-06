    <header>
    <div class="menu">
    <div class="navbar-fixed">
    <nav class="white teal-text text-lighten-1">  
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo center"><img src="./public/images/Logo_projet_4.png" alt="Logo" title="Logo Jean Forteroche" class="responsive-img"></a>
            <a href="#" data-target="mobile-demo" class=" sidenav-trigger"><i class="material-icons">menu</i></a>

          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li class="active"><a href="index.php" title="Page d'accueil" class=" blue-grey-text text-darken-3">Accueil</a></li>
            <li><a href="index.php?action=aboutMe" title="A propos de l'auteur" class=" blue-grey-text text-darken-3">A propos</a></li>

            <?php
                  if(isset($_SESSION) && empty($_SESSION))
                   {
            ?>
                     <li><a href="index.php?action=register" class=" blue-grey-text text-darken-3" title="Adhésion"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Adh&eacute;sion gratuite</a></li>
                     <li><a href="index.php?action=login" class=" blue-grey-text text-darken-3" title="S'identifier"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Connexion</a></li>
            <?php 
                   }
            ?>

            <?php
                  if(isset($_SESSION) && !empty($_SESSION) && ($_SESSION['role'] == '1')) 
                    {
            ?>
                      <li class="welcome" title="Bienvenu(e)">Bienvenu(e) <?= $_SESSION['pseudo']?></li>
                      <li><a  href="index.php?action=administration" class=" blue-grey-text text-darken-3" title="Espace d'administration"> <i class="large material-icons">dashboard</i></a></li>
                      <li><a href="index.php?action=logout" class=" blue-grey-text text-darken-3" title="Se déconnecter"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;D&eacute;connexion</i></a></li>

            <?php 
                    }
            ?>

            <?php
                  if(isset($_SESSION) && !empty($_SESSION) && ($_SESSION['role'] == '0'))
                    {
            ?>
                      <li class="welcome" title="Bienvenu(e)">Bienvenu(e) <?= $_SESSION['pseudo']?></li>
                      <li><a href="index.php?action=logout" class=" blue-grey-text text-darken-3" title="Se déconnecter"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;D&eacute;connexion</i></a></li>
            <?php 
                    }
            ?>

          </ul>
        </div>
    </nav>
    </div>
              <ul class="sidenav" id="mobile-demo">        
                <li class="active"><a href="index.php" title="Page d'accueil">Accueil</a></li>
                <li><a href="index.php?action=aboutMe" title="A propos de l'auteur">A propos</a></li>
                <li><a href="index.php?action=register" class=" blue-grey-text text-darken-3" title="Adhésion gratuite"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Adh&eacute;sion gratuite</a></li>
                <li><a href="index.php?action=login" class=" blue-grey-text text-darken-3" title="S'identifier"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Connexion</a></li>

            <?php
                   if(isset($_SESSION) && !empty($_SESSION) && ($_SESSION['role'] == '1')) 
                     {
            ?>
                        <li class="welcome" title="Bienvenu(e)">Bienvenu(e) <?= $_SESSION['pseudo']?></li>
                        <li><a  href="index.php?action=administration" class=" blue-grey-text text-darken-3" title="Espace d'administration">Tableau de bord</a></li>
                        <li><a href="index.php?action=logout" class=" blue-grey-text text-darken-3" title="Se déconnecter"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;D&eacute;connexion</i></a></li>
            <?php 
                      }
            ?>

            <?php
                    if(isset($_SESSION) && !empty($_SESSION) && ($_SESSION['role'] == '0'))
                      {
            ?>
                      <li class="welcome" title="Bienvenu(e)">Bienvenu(e) <?= $_SESSION['pseudo']?></li>
                      <li><a href="index.php?action=logout" class=" blue-grey-text text-darken-3" title="Se déconnecter"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;D&eacute;connexion</i></a></li>
            <?php 
                       }
            ?>

              </ul>
    </div> 
    </header>
