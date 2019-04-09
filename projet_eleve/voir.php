<?php

    require 'database.php';

    if(!empty($_GET['id'])) 
    {
        $id = verify($_GET['id']);
    }
     
    $db = Database::connect();
    $req = $db->prepare("SELECT eleve_6_eme.id_eleve_6, eleve_6_eme.nom, eleve_6_eme.prenom, eleve_6_eme.classe, eleve_6_eme.photo, eleve_6_eme.date_naissance, eleve_6_eme.lieu_naissance FROM eleve_6_eme WHERE eleve_6_eme.id_eleve_6 = ?");
    $req->execute(array($id));
    $eleve = $req->fetch();
    Database::disconnect();

    function verify($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <title>Les informations sur l'élève</title>
  </head>
  <body>
    <div class="container info">
            <div class="row">
               <div class="col-sm-6">
                    <h1><strong>Informations sur l'élève:<br><?php echo $eleve['nom']. ' '. $eleve['prenom'];?></strong></h1>
                    <br>
                    <form>
                      <div class="form-group">
                        <label>Nom:</label><?php echo '  '.$eleve['nom'];?>
                      </div><div class="form-group">
                        <label>Prenom:</label><?php echo '  '.$eleve['prenom'];?>
                      </div>
                      <div class="form-group">
                        <label>Classe:</label><?php echo '  '.$eleve['classe'];?>
                      </div>
                      <div class="form-group">
                        <label>Date de naissance:</label><?php echo '  '.$eleve['date_naissance'];?>
                      </div>
                      <div class="form-group">
                        <label>Lieu de naissance:</label><?php echo '  '.$eleve['lieu_naissance'];?>
                      </div>

                    </form>
                    <br>
                    <div class="form-actions">
                      <a class="btn btn-primary" href="index.php"> Retour</a>
                    </div>
                </div> 
                <div class="col-sm-6">
                    <div>
                        <img src="<?php echo 'images/'.$eleve['photo'];?>" alt="<?php echo $eleve['nom']. ' '. $eleve['prenom'];?>">
                        <div><?php echo $eleve['classe'];?></div>
                          <div class="caption">
                            <h4><?php echo $eleve['nom'];?></h4>
                            <p><?php echo $eleve['prenom'];?></p>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>