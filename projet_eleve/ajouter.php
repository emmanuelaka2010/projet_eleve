<?php
     
    require 'database.php';

    if(!empty($_GET['id'])) 
    {
        $id = verify($_GET['id']);
        
    }
    
    $nomError = $prenomError = $classeError = $date_naissanceError = $lieu_naissanceError = $photoError = $nom = $prenom = $classe = $date_naissance= $lieu_naissance= $photo = "";

    if(!empty($_POST)) 
    {
        $nom               = verify($_POST['nom']);
        $prenom        = verify($_POST['prenom']);
        $classe              = verify($_POST['classe']);
        $date_naissance     = verify($_POST['date_naissance']); 
        $lieu_naissance           = verify($_POST['lieu_naissance']);  
        $photo              = verify($_FILES["photo"]["name"]);
        $imagePath          = 'images/'. basename($photo);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess          = true;
       
        if(empty($nom)) 
        {
            $nomError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($prenom)) 
        {
            $prenomError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($classe)) 
        {
            $classeError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
         
        if(empty($date_naissance)) 
        {
            $date_naissanceError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($lieu_naissance)) 
        {
            $lieu_naissanceError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($photo))
        {
            $isImageUpdated = false;
        }
        else
        {
            $isImageUpdated = true;
            $isUploadSuccess =true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $photoError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $photoError = "Le fichier existe deja";
                $isUploadSuccess = true;
            }
            if($_FILES["photo"]["size"] > 5000000) 
            {
                $photoError = "Le fichier ne doit pas depasser les 5000KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["photo"]["tmp_name"], $imagePath)) 
                {
                    $photoError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }
        
        if($isSuccess && $isUploadSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO eleve_6_eme (nom,prenom,classe,photo,date_naissance,lieu_naissance) values(?, ?, ?, ?, ?,?)");
            $statement->execute(array($nom,$prenom,$classe,$photo,$date_naissance,$lieu_naissance));
            Database::disconnect();
            header("Location: index.php");
        }
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

    <title>AJouter</title>
  </head>
  <body>
    <div class="container info">
           <h1><strong>Ajouter un élève</strong></h1>
           <br>
            <div class="row">
                <br>
                <form class="form" action="ajouter.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php echo $nom;?>">
                        <span class="help-inline"><?php echo $nomError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom:</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="<?php echo $prenom;?>">
                        <span class="help-inline"><?php echo $prenomError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="classe">Classe:</label>
                        <input type="text" class="form-control" id="classe" name="classe" placeholder="Classe" value="<?php echo $classe;?>">
                        <span class="help-inline"><?php echo $classeError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="date_naissance">Date de naissance:</label>
                        <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?php echo $date_naissance;?>">
                        <span class="help-inline"><?php echo $date_naissanceError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="classe">Lieu de naissance:</label>
                        <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance" placeholder="Lieu de naissance" value="<?php echo $lieu_naissance;?>">
                        <span class="help-inline"><?php echo $lieu_naissanceError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="photo">Sélectionner une photo:</label>
                        <input type="file" id="photo" name="photo"> 
                        <span class="help-inline"><?php echo $photoError;?></span>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> Ajouter</button>
                        <a class="btn btn-primary" href="index.php"> Retour</a>
                   </div>
                </form>
            </div>
        </div>   

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>


