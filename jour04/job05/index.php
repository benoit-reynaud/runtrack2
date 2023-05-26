<!--
    Le code vérifie si la méthode de requête est 
    POST ($_SERVER['REQUEST_METHOD'] === 'POST').

    S'il s'agit d'une requête POST, il récupère les valeurs 
    des champs username et password en utilisant isset pour 
    vérifier leur existence.

    Ensuite, il compare les valeurs saisies. Si le username 
    est "John" et le password est "Rambo", il affiche le message 
    "C'est pas ma guerre". Sinon, il affiche le message "Votre pire cauchemar".

    Le code affiche le formulaire de connexion avec 
    les champs <input> correspondants.
-->

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($username === 'John' && $password === 'Rambo') {
        echo "C'est pas ma guerre";
    } else {
        echo "Votre pire cauchemar";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de connexion</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Se connecter">
    </form>
</body>
</html>