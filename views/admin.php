<?php
//inclusion du fichier de la connection
include('../config/connection.php');
?>
<?php include('../includes/header.php');?>
        <div class="row">
            <div class="col-md-6">
               <div class="row">
                    <div class="col-md-6">
                        <h1 style="color: blue;">Admin</h1>
                    </div>
               </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                      <h1>Bonjour <em style="color: blue;"><?=$_SESSION['email'];?></em> Vous etes connecté.</h1>                            
            </div>
        </div>
<?php include('../includes/footer.php');?>
  