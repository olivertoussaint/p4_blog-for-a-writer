<?php $title ='Login du membre'; ?>  
<?php ob_start(); ?>
    <div id="admin-page"></div>
        
        <div class="container login-form">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <h5 class="card-header">Espace membre <br /><hr class="hr" />
                    Merci de vous identifier</h5>
            <div class="jumbotron jumbotron">
                <form action="index.php?action=loginSubmit" method="POST" id="form_login">
                    <div class="form-group">
                        <label for="pseudo" title="Pseudo"><span class="required">*</span> Pseudo</label><br />
                        <input type="text" name="pseudo" id="pseudo" required />                        
                    </div>
                    <div class="form-group">
                        <label for="password"><span class="required">*</span> Mot de passe</label><br />
                        <input type="password" name="password" id="password" required />                        
                    </div>
                    
                    <div class="col-md-4"></div>
                    <button type="submit" class="btn btn-primary user" name="form_login" title="connexion"><span class="glyphicon glyphicon-user">&nbsp;</span>Se connecter</button>
                </form>              
            </div>
            <div id="required">
                <p><span class="required">*&nbsp;</span>champ requis</p>
                <p class="link_login-2"><a href="index.php?action=register" title="Cliquez ici pour créer votre espace membre">Pas encore membre ?</a></p>
                <p class="back-to-home-2"><a href="index.php" title="retour à la page d'accueil">Retour à la page d'accueil</a></p>
            </div>

        </div>
    </div>

    <?php $content = ob_get_clean(); ?>
    <?php require('view/frontend/formTemplate.php'); ?>