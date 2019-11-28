<?php $title = "Nouvel article";?> 
<?php ob_start(); ?>
    <h3 class="new-post-title">Rédaction d'un nouveau chapitre</h3>
    <div id="admin-page"></div>
    <div class="container create-form">
        <div class="col-lg-12"></div>
            <div class="col-lg-10 col-md-12 col-xs-12">
                <form action="index.php?action=submitPost" method="POST">
                        <div class="form-group" id="title">
                            <label for="title">Titre</label>
                                <div>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Indiquez ici un titre au chapitre" />
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="content">Chapitre</label>
                                <div>
                                    <textarea name="mytextarea" id="mytextarea" class="form-control" placeholder="Indiquez ici votre chapitre"></textarea>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="container">
                                <button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
                                    <a href="index.php?action=administration" class="btn btn-info" role="button">Retour sur le tableau de bord</a>
                            </div>
                        </div>
                </form>
            </div>
    </div>

      <?php
      $content = ob_get_clean();
      ?>      

      <?php
     require('view/backend/template_text.php'); ?>