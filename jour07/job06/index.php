<?php
function leetSpeak($str) {
    $leetTable = array(
        'A' => '4',
        'B' => '8',
        'E' => '3',
        'G' => '6',
        'L' => '1',
        'S' => '5',
        'T' => '7',
        'a' => '4',
        'b' => '8',
        'e' => '3',
        'g' => '6',
        'l' => '1',
        's' => '5',
        't' => '7'
    );

    $result = strtr($str, $leetTable);
    return $result;
}

$input = ""; // Initialiser la variable $input

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Récupérer la valeur du champ texte
    $input = $_POST['text'];

    // Appeler la fonction leetSpeak() pour convertir le texte
    $output = leetSpeak($input);
} else {
    $output = ""; // Initialiser la sortie
}

?>

<!-- Formulaire HTML -->
<form method="POST" action="">
    <label for="text">Texte :</label>
    <input type="text" name="text" id="text" value="<?php echo htmlspecialchars($input); ?>"><br>
    <input type="submit" name="submit" value="Convertir">
</form>

<!-- Affichage du résultat -->
<p>Résultat : <?php echo htmlspecialchars($output); ?></p>