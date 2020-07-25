<!doctype html>
<html lang="fr">
  <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
  </head>
  <body>
     <!-- Debut de page-->
<div class="main">
<div class="container">
<form method="POST" action="minichat.php">
  <div class="form-group">
    <label for="pseudo">Pseudo : </label>
    <input type="text" class="form-control" id="pseudo" name="pseudo" required>
  </div>
  <div class="form-group">
    <label for="message">Message : </label>
    <textarea class="form-control" id="message" name="message" required ></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Valider</button>
</form>
</div>
<hr>
<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT pseudo, message FROM minichat');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
?>

<div class="container afficheMessage">
   <ul class="list-group">
      <li class="list-group-item"><?php echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>'; ?></li>
   </ul>
</div>
<?php
}

$reponse->closeCursor();

?>
</div>
     <!-- Fin de page-->

     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>