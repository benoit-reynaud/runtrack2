<?php
session_start();

// Vérifier si le bouton "reset" a été cliqué
if (isset($_POST['reset'])) {
    // Réinitialiser la liste des prénoms en supprimant la variable de session
    unset($_SESSION['prenoms']);
} elseif (isset($_POST['prenom'])) {
    // Vérifier si un prénom a été soumis via le formulaire
    $prenom = $_POST['prenom'];
    
    // Vérifier si la variable de session existe
    if (isset($_SESSION['prenoms'])) {
        // Ajouter le prénom à la liste existante
        $_SESSION['prenoms'][] = $prenom;
    } else {
        // Créer une nouvelle liste contenant le prénom
        $_SESSION['prenoms'] = array($prenom);
    }
}

// Afficher l'ensemble des prénoms
if (isset($_SESSION['prenoms'])) {
    echo "Liste des prénoms : <br>";
    foreach ($_SESSION['prenoms'] as $prenom) {
        echo $prenom . "<br>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajout de prénoms</title>
</head>
<body>
    <form method="post">
        <input type="text" name="prenom" placeholder="Entrez un prénom">
        <input type="submit" value="Ajouter">
    </form>
    
    <form method="post">
        <input type="submit" name="reset" value="Reset">
    </form>
</body>
</html>