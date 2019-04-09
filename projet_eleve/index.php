
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <title>Liste des élèves</title>
  </head>
  <body>
    <h1 id="heading"><strong>Liste des élèves du groupe   </strong><a href="ajouter.php" class="btn btn-success btn-lg">Ajouter</a></h1>

    <table class="table table-striped">
  <thead>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Classe</th>
        <th>Lieu de naissance</th>
        <th>Date de naissance</th>
        <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
          
            require 'database.php';
            $db = Database::connect();
            $req = $db->query('SELECT eleve_6_eme.id_eleve_6, eleve_6_eme.nom, eleve_6_eme.prenom, eleve_6_eme.classe, eleve_6_eme.date_naissance, eleve_6_eme.lieu_naissance FROM eleve_6_eme ORDER BY eleve_6_eme.nom ASC');
            while($eleve = $req->fetch())
            {
                echo '<tr>';
                echo '<td>'. $eleve['nom']. '</td>';
                echo '<td>'. $eleve['prenom']. '</td>';
                echo '<td>'. $eleve['classe']. '</td>';
                echo '<td>'. $eleve['lieu_naissance']. '</td>';
                echo '<td>'. $eleve['date_naissance']. '</td>';
                
                echo '<td width=400>';
                echo '<a class="btn btn-success" href="voir.php?id='.$eleve['id_eleve_6'].'">Voir</a>';
                echo ' ';
                echo '<a class="btn btn-primary" href="modifier.php?id='.$eleve['id_eleve_6'].'">Modifier</a>';
                echo ' ';
                echo '<a class="btn btn-warning" href="archiver.php?id='.$eleve['id_eleve_6'].'">Archiver</a>';
                echo ' ';
                echo '<a class="btn btn-danger" href="supprimer.php?id='.$eleve['id_eleve_6'].'">Supprimer</a>';
                echo '</tr>';
            }
            Database::disconnect();
        ?>
    
  </tbody>
</table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>