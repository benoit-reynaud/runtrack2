<?php
session_start();

// Vérifier si la variable de session "nbvisites" existe
if (!isset($_SESSION['nbvisites'])) {
  // Si elle n'existe pas, l'initialiser à 0
  $_SESSION['nbvisites'] = 0;
}

// Vérifier si le bouton "reset" a été soumis
if (isset($_POST['reset'])) {
  // Réinitialiser le compteur à 0
  $_SESSION['nbvisites'] = 0;
}

// Incrémenter le compteur à chaque visite de la page
$_SESSION['nbvisites']++;

// Afficher le contenu de la variable de session "nbvisites"
echo "Nombre de visites : " . $_SESSION['nbvisites'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Compteur de visites</title>
</head>
<body>
  <form method="post">
    <input type="submit" name="reset" value="Réinitialiser">
  </form>
</body>
</html>
