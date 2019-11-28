<?php $title ='Inscription du membre'; ?> 
<?php ob_start(); ?> 

    <?php 
        if (isset($_GET['error']) && $_GET['error'] == 'invalidUsername') {
        echo '<p id="error">Pseudo déjà utilisé</p>';
    }
        if (isset($_GET['error']) && $_GET['error'] == 'pseudoChecked') {
        echo '<P id="error">Adresse email déjà utilisée</p>';
    }

    ?>

    <div id="admin-page"></div>        
        <div class="container register-form">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <h5 class="card-header">Vous êtes un nouveau membre ?</h5>
            <div class="jumbotron jumbotron">
                <form action="index.php?action=addMember" method="POST" id="form_registration">
                    <div class="form-group">
                        <label for="pseudo" title="Pseudo"><span class="required">*</span> Pseudo</label><br />
                        <input type="text" name="pseudo" id="pseudo" required />                        
                    </div>
                    <div class="form-group">
                        <label for="email" title="adresse email"><span class="required">*</span> Adresse email</label><br />
                        <input type="email" name="email" id="email" required />                     
                    </div>
                    <div class="form-group">
                        <label for="password"><span class="required">*</span> Mot de passe</label><br />
                        <input type="password" name="password" id="password" required />                        
                    </div>
                    <div class="form-group">
                        <label for="password_confirm"><span class="required">*</span> Confirmez le mot de passe</label><br />
                        <input type="password" name="password_confirm" id="password_confirm" required />                        
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="role" id="role" value="Utilisateur"  />                        
                    </div>
                    <div class="col-md-4"></div>
                    <button type="submit" class="btn btn-primary register-user" name="form_registration" title="Créer votre compte"><span class="glyphicon glyphicon-user">&nbsp;</span>Créer mon compte</button>
                </form>              
            </div>
            <div id="required">
            <p><span class="required">* </span>champ requis</p>
            <p class="link_login-1"><a href="index.php?action=login" title="Cliquez ici pour vous logger">Déjà membre ?</a></p>
            <p class="back-to-home-1"><a href="index.php" title="retour à la page d'accueil">Retour à la page d'accueil</a></p>
            </div>
        </div>
        </div>
    <?php $content = ob_get_clean(); ?>

    <?php require('view/frontend/formTemplate.php'); ?>

