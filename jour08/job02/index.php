<?php
// Vérifier si le cookie existe
if (isset($_COOKIE['nbvisites'])) {
    // Récupérer la valeur du cookie
    $nbVisites = $_COOKIE['nbvisites'];
} else {
    // Si le cookie n'existe pas, initialiser à 0
    $nbVisites = 0;
}

// Vérifier si le bouton "reset" a été cliqué
if (isset($_POST['reset'])) {
    // Réinitialiser le compteur en supprimant le cookie
    setcookie('nbvisites', '', time() - 3600); // Définir une date d'expiration passée
    $nbVisites = 0;
} else {
    // Incrémenter le compteur de visites
    $nbVisites++;
    // Mettre à jour le cookie avec la nouvelle valeur
    setcookie('nbvisites', $nbVisites, time() + 3600); // Définir une date d'expiration future (1 heure)
}

// Afficher le nombre de visites
echo "Nombre de visites : " . $nbVisites;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Compteur de visites</title>
</head>
<body>
    <form method="post">
        <input type="submit" name="reset" value="Reset">
    </form>
</body>
</html>
