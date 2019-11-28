<?php $title = 'Billet simple pour l\'Alaska - Jean Forteroche';?> 
<?php ob_start();?>
          <div class="container">
            <div class="row">
              <div id="main-title">
                  <h1 class="title">Un billet simple pour l'Alaska</h1>
              </div>
                  <div class="card-panel blue lighten-5">
                    <p >
                      <h5 id="author-header-preface">Chers lecteurs, Chères lectrices,</h5>   
                      <h6 id="author-preface">Je vous propose de me suivre en ligne pour la rédaction de mon tout nouveau roman.<br />
                              Toutes suggestions et critiques constructives pour ce beau projet seront les bienvenues.</h6>
                    </p>
                  </div>
            </div>
          </div>

          <div id="chapters" class="container row">

    <?php
    while ($data = $posts->fetch()) {
    ?>

          <div class="col s12 m6 l6 xl4">
              <div class="card z-depth-3">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="./public/uploads/<?= ($data['image']) ?>" alt="<?= htmlspecialchars($data['post_title']) ?>" />
                  </div>
          <div class="card-content">
              <h5 class="grey-text text-darken-2">Chapitre&nbsp;<?= $data['id']; ?>&nbsp;:&nbsp;<strong><?= htmlspecialchars($data['post_title']) ?></strong></h5>  
              <h6 class="post-date">publié le <?= $data['post_date_fr'] ?></h6>
              <h6 class="right">par :&nbsp; Jean Forteroche</h6> 
          </div>      
          <div class="card-content"><hr />
              <span class="card-title activator grey-text text-darken-4"><i class="material-icons right">more_vert</i></span>
              <p><a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="waves-effect waves-light btn">lire le chapitre</a></p>
          </div>
          <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"><?= htmlspecialchars($data['post_title']) ?><i class="material-icons right" >close</i></span>
                  <p>
                        <?php
                            $lg_max       = 850;
                            $blog_content = $data['blog_content'];
                            $blog_content = strip_tags($blog_content);
                            if (strlen($blog_content) > $lg_max) {
                            $blog_content = substr($blog_content, 0, $lg_max);
                            $last_space   = strripos($blog_content, " ");
                            $blog_content = substr($blog_content, 0, $last_space) . " [...]";
                        }      
                          echo $blog_content;     
                        ?>
                  </p>
          </div>
              </div>                                   
          </div>
      <?php 
          }   
            $posts->closeCursor();
      ?>         
          </div>
      <?php
            $content = ob_get_clean();
      ?>              
      <?php
        require('view/frontend/template.php');
      ?> 