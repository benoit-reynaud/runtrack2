<?php
function mettreEnGras($str) {
    $mots = explode(" ", $str);
    foreach ($mots as &$mot) {
        if (ctype_upper(substr($mot, 0, 1))) {
            $mot = "<b>" . $mot . "</b>";
        }
    }
    return implode(" ", $mots);
}

function cesar($str, $decalage = 2) {
    $resultat = "";
    $length = strlen($str);
    for ($i = 0; $i < $length; $i++) {
        $char = $str[$i];
        if (ctype_alpha($char)) {
            $ascii = ord($char);
            $ascii += $decalage;
            if (ctype_upper($char)) {
                $ascii = ($ascii - 65) % 26 + 65;
            } else {
                $ascii = ($ascii - 97) % 26 + 97;
            }
            $char = chr($ascii);
        }
        $resultat .= $char;
    }
    return $resultat;
}

function ajouterUnderscore($str) {
    $mots = explode(" ", $str);
    foreach ($mots as &$mot) {
        if (substr($mot, -2) === "me") {
            $mot .= "_";
        }
    }
    return implode(" ", $mots);
}

$str = "";
$resultat = "";

if (isset($_POST['submit'])) {
    $str = $_POST['str'];
    $fonction = $_POST['fonction'];

    if ($fonction === "gras") {
        $resultat = mettreEnGras($str);
    } elseif ($fonction === "cesar") {
        $decalage = isset($_POST['decalage']) ? intval($_POST['decalage']) : 2;
        $resultat = cesar($str, $decalage);
    } elseif ($fonction === "plateforme") {
        $resultat = ajouterUnderscore($str);
    }
}

?>

<form method="POST" action="">
    <label for="str">Texte :</label>
    <input type="text" name="str" id="str" value="<?php echo htmlspecialchars($str); ?>"><br>
    <label for="fonction">Fonction :</label>
    <select name="fonction" id="fonction">
        <option value="gras">Mettre en gras les mots commençant par une majuscule</option>
        <option value="cesar">César - Décaler les caractères</option>
        <option value="plateforme">Ajouter un underscore aux mots finissant par "me"</option>
    </select><br>
    <label for="decalage">Décalage :</label>
    <input type="number" name="decalage" id="decalage" value="2"><br>
    <input type="submit" name="submit" value="Valider">
</form>

<p>Résultat : <?php echo htmlspecialchars($resultat); ?></p>