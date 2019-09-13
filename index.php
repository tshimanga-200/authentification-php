<?php
//inclusion du fichier de la connection
include('config/connection.php');
//soumition du formaulaire
if(isset($_POST['submit'])){
  //test sur le donnée à soumèttre 
    if(isset($_POST['email']) && $_POST['email']){
        if(isset($_POST['mdp']) && $_POST['mdp']){
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

              //affectation de variable
              $email = htmlspecialchars($_POST['email']);
              $mdp = htmlspecialchars($_POST['mdp']);
              
              //verification des information de l'utilisateur dans la base de donneés

              $verif = $pdo->prepare('SELECT * FROM client WHERE nom = ?');
              $verif->execute(array($email));
              $verif_ok = $verif->rowCount();
              if($verif_ok === 1){
                  $postnom = $verif->fetch();
                  $nom = $postnom['nom'];
                  $postnom = $postnom['postnom'];
                  $_SESSION['email'] = $nom;
                  $_SESSION['mdp'] = $postnom;
                  header('Location: view/admin.php');
              }else{
                $error = "Votre adresse e-mail est incorrect";
              }
            } else{
              $error = "Veuillez taper une adresse e-mail valide";
            }                     
        }else{
            $error = "Veuillez saisir votre mot de passe";
        }
    }else{
        $error = "Veuillez saisir votre adresse email";
    }
}
?>
<?php include('includes/header.php');?>
        <div class="row">
            <div class="col-md-6">
               <div class="row">
                    <div class="col-md-6">
                        <h1>Identification</h1>
                    </div>
               </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                         <?php
                         //affichage en cas d'erreur
                            if(isset($error)){
                              echo "<div class=\"alert-danger\">$error</div>";
                            }else{
                              echo "<br>";
                            }
                          ?>
                            <form action="" method="post" role="form" class="contactForm">
                              <div class="form-group">
                                <input type="text" name="email" class="form-control">
                              </div>
                              <div class="form-group">
                                <input type="password" name="mdp" class="form-control" id="mdp">
                              </div> 
                              
                             <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Connection</button></div>
                            </form>
                           
            </div>
        </div>
        <?php include('includes/footer.php');?>
  