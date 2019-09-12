<?php
//inclusion du fichier de la connection
include('config/connection.php');
//soumition du formaulaire
if(isset($_POST['submit'])){
  //test sur le donnée à soumèttre 
    if(isset($_POST['nom']) && $_POST['nom']){
        if(isset($_POST['postnom']) && $_POST['postnom']){
                    //affectation de variable
                    $mail = htmlspecialchars($_POST['mail']);
                    $mdp = htmlspecialchars($_POST['mdp']);
                    
                    //insertion dans la base de donneés
                    $insert = $pdo->prepare('INSERT INTO student (nom,postnom,promotion,universite) VALUES (?,?,?,?)');
                    $insert->execute(array($nom,$postnom,$promotion,$universite));
                    $succe = "Votre enregistrement à reussit";
               
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
                                <input type="email" name="email" class="form-control">
                              </div>
                              <div class="form-group">
                                <input type="password" name="mdp" class="form-control" id="mdp">
                              </div> 
                              
                             <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Connection</button></div>
                            </form>
                           
            </div>
        </div>
        <?php include('includes/footer.php');?>
  