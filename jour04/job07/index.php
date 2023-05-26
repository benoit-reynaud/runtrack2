<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $largeur = isset($_POST['largeur']) ? $_POST['largeur'] : '';
    $hauteur = isset($_POST['hauteur']) ? $_POST['hauteur'] : '';

    if (is_numeric($largeur) && is_numeric($hauteur)) {
        $largeur = intval($largeur);
        $hauteur = intval($hauteur);

        // Construction de la maison
        $maison = '';
        $espaces = '';

        // Ajout des espaces pour l'alignement vertical
        for ($i = 0; $i < $hauteur; $i++) {
            $espaces .= '&nbsp;&nbsp;&nbsp;&nbsp;';
        }

        // Construction du toit de la maison
        $maison .= $espaces . '/_\\' . '<br>';

        // Construction des murs et du sol/plafond de la maison
        for ($i = 0; $i < $hauteur - 2; $i++) {
            $maison .= $espaces . '/' . str_repeat('_', $i * 2 + 1) . '\\' . '<br>';
        }
        $maison .= '/' . str_repeat('_', $hauteur * 2 - 3) . '\\' . '<br>';

        // Construction de l'espace intérieur de la maison
        for ($i = 0; $i < $hauteur - 4; $i++) {
            $maison .= '|' . str_repeat(' ', $hauteur * 2 - 5) . '|' . '<br>';
        }

        // Ajout des lignes du sol/plafond
        $maison .= '|' . str_repeat('_', $hauteur * 2 - 5) . '|' . '<br>';

        // Affichage de la maison
        echo $maison;
    } else {
        echo "Veuillez entrer des valeurs numériques pour la largeur et la hauteur.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire</title>
</head>
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="largeur">Largeur:</label>
        <input type="text" name="largeur" id="largeur" required><br>

        <label for="hauteur">Hauteur:</label>
        <input type="text" name="hauteur" id="hauteur" required><br>

        <input type="submit" value="Valider">
    </form>
</body>
</html>
