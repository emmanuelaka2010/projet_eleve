<?php
    require 'database.php';
 
    if(!empty($_GET['id'])) 
    {
        $id = verify($_GET['id']);
    }

    if(!empty($_POST)) 
    {
        $id = verify($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM eleve_6_eme WHERE id_eleve_6 = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: index.php"); 
    }

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

    <title>Supprimer</title>
  </head>
  <body>
    <div class="container info">
           <h1>Suppression d'un élève</h1>
           <br>
            <div class="row">
                <form class="form" action="supprimer.php" role="form" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                    <p class="alert alert-warning">Êtes-vous sûr de vouloir supprimer ?</p>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-danger">Oui</button>
                      <a class="btn btn-warning" href="index.php">Non</a>
                    </div>
                </form>
            </div>
        </div>  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>