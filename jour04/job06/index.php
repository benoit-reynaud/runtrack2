<!--
    Le code vérifie si la méthode de requête est 
    GET ($_SERVER['REQUEST_METHOD'] === 'GET').

    S'il s'agit d'une requête GET, il récupère la valeur 
    du champ nombre en utilisant isset pour vérifier son existence.

    Ensuite, il utilise la fonction is_numeric() pour vérifier
    si la valeur saisie est un nombre.

    Si c'est le cas, il effectue un calcul pour déterminer si le nombre 
    est pair ou impair. Si le résultat du calcul est 0, c'est un nombre 
    pair, sinon c'est un nombre impair.

    Le code affiche le message correspondant ("Nombre pair", "Nombre impair" 
    ou "Veuillez entrer un nombre valide").

    Le code affiche le formulaire GET avec le champ <input> correspondant.
-->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';

    if (is_numeric($nombre)) {
        if ($nombre % 2 === 0) {
            echo "Nombre pair";
        } else {
            echo "Nombre impair";
        }
    } else {
        echo "Veuillez entrer un nombre valide";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire GET</title>
</head>
<body>
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>

        <input type="submit" value="Valider">
    </form>
</body>
</html>
