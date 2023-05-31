<?php
// Vérifier si le formulaire de connexion a été soumis
if (isset($_POST['connexion'])) {
    // Récupérer le prénom entré dans le formulaire
    $prenom = $_POST['prenom'];
    
    // Stocker le prénom dans un cookie valide pendant 1 heure
    setcookie('prenom', $prenom, time() + 3600);
    
    // Rediriger vers la page d'accueil pour afficher le message de bienvenue
    header('Location: index.php');
    exit();
}

// Vérifier si l'utilisateur est déjà connecté (cookie existant)
if (isset($_COOKIE['prenom'])) {
    $prenom = $_COOKIE['prenom'];
    echo "Bonjour $prenom !";
    echo "<br>";
    echo "<form method='post'>";
    echo "<input type='submit' name='deco' value='Déconnexion'>";
    echo "</form>";
} else {
    // Afficher le formulaire de connexion
    echo "<form method='post'>";
    echo "<input type='text' name='prenom' placeholder='Entrez votre prénom'>";
    echo "<input type='submit' name='connexion' value='Connexion'>";
    echo "</form>";
}

// Gérer la déconnexion
if (isset($_POST['deco'])) {
    // Supprimer le cookie en le rendant invalide
    setcookie('prenom', '', time() - 3600);
    
    // Rediriger vers la page d'accueil pour afficher le formulaire de connexion
    header('Location: index.php');
    exit();
}
?>
