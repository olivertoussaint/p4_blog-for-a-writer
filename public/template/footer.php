  <footer class="page-footer">
          <div class="container">
              <div class="row">
                <div class="col s12 m6 l6 xl2">
                  <p><img src="./public/images/Logo_projet_4.png" alt="Logo" title="Logo Jean Forteroche"></p>
                </div>

          <div class="col s12 m6 l6 xl6">
            <h5 class="white-text">A propos de ce blog</h5>
            <p class="teal-text text-lighten-1">
              Je vous propose de me suivre en ligne pour la rédaction de mon tout nouveau roman.<br />
              Toutes suggestions et critiques constructives pour ce beau projet seront les bienvenues.
            </p> 
          </div>

          <div class="col s12 m6 l6 xl2 ">
            <h5 class="white-text left-align">Pages</h5>
              <ul class="left-position">
                <li class="left-align"><a class="teal-text text-lighten-1" href="index.php">Accueil</a></li>
                <li class="left-align"><a class="teal-text text-lighten-1" href="index.php?action=aboutMe">A propos </a></li>
      <?php
            if(isset($_SESSION) && !empty($_SESSION)) 
                {
          ?>
                <li class="left-align"><a class="teal-text text-lighten-1" href="index.php?action=administration">Administration</a></li>
                </ul>
        <?php 
                }
            ?>
          </div>
                  <div class="col s12 m6 l6 xl2 center-align">
                    <h5 class="white-text">Restons connecté</h5>
                      <p class="center-align">
                        <i class=" fa fa-facebook fa-lg"></i>
                        <i class=" fa fa-twitter-square fa-lg"></i>
                        <i class=" fa fa-google fa-lg"></i>
                        <i class=" fa fa-instagram fa-lg"></i>
                        <i class=" fa fa-linkedin fa-lg"></i> 
                      </p>
                  </div>
              </div>        
            <div class="footer-copyright">
              <div class="container center-align">
                   © 2019 Jean FORTEROCHE - Billet simple pour L'Alaska - Projet N°4 - Cursus DWJ Openclassrooms | 
                  <a class="white-text" href="index.php?action=mentionsLegales" >Mentions Légales</a>
              </div>
            </div>
          </div>
  </footer>

