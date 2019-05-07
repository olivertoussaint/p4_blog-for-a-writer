  <?php
  session_start();
 // Connexion à la base de données
 try
 {
    $bdd = new PDO('mysql:host=localhost;dbname=blog_jean_forteroche;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 }
 catch (Exception $e)
{
   // En cas d'erreur, on affiche un message et on arrête tout
         die('Erreur : ' . $e->getMessage());
 }

$pseudo = $email_1 = $email_2 = $pass_hache1 = $pass_hache2 = "";

 function secure($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    return $data;
 }

 if (isset($_POST['form_registration'])) {
      if(!empty($_POST['pseudo']) AND !empty($_POST['email_1']) AND !empty($_POST['email_2'])AND !empty($_POST['password_1'])AND !empty($_POST['password_2']))
        {
        $pseudo = secure($_POST['pseudo']);
        $email_1 = secure($_POST['email_1']);
        $email_2 = secure($_POST['email_2']);
        $pass_hache1 = $_POST['password_1'];
        $pass_hache2 = $_POST['password_2'];
        $pass_hache1 = password_hash($_POST['password_1'], PASSWORD_DEFAULT);
        $pass_hache2 = password_hash($_POST['password_2'], PASSWORD_DEFAULT);
 
        // Insertion
        $insert=$bdd->prepare("INSERT INTO members (pseudo, email, password) VALUES (?,?,?)");
        $insert->execute(array ($pseudo,$email_1,$pass_hache1));

        //  Récupération de l'utilisateur et de son pass hashé
        $req = $bdd->prepare('SELECT id, password FROM members WHERE pseudo = :pseudo');
        $req->execute(array(
        'pseudo' => $pseudo));
        $resultat = $req->fetch();

        // Comparaison du password envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['password_1'], $resultat['password']);

        if (!$resultat)
    {
    echo 'Mauvais identifiant ou mot de passe !';
    }
    else
    {
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        
        header("Location: index.php");
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
    }
    }
      else
    {
         $erreur = "Tous les champs doivent être complétés";
    }
    }

     if (isset($_POST['form_connection'])) {
        if (!empty($_POST['pseudo']) AND !empty($_POST['password_1'])) {
            echo 'Vous êtes connecté !';
            $_SESSION['pseudo']=$_POST['pseudo'];
            header("Location: index.php");
            
        }
        else {
           $erreur = "Veuillez remplir tous les champs !"; 
        }
     }

?>


