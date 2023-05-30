<?php
function occurrences($str, $char) {
    $count = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] === $char) {
            $count++;
        }
    }
    return $count;
}

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    $str = $_POST['str'];
    $char = $_POST['char'];
    $result = occurrences($str, $char);
    echo "Le nombre d'occurrences du caractère '$char' dans la chaîne '$str' est : $result";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Compteur d'occurrences</title>
</head>
<body>
    <form method="post" action="">
        <label for="str">Chaîne de caractères :</label>
        <input type="text" name="str" id="str" required><br>
        
        <label for="char">Caractère :</label>
        <input type="text" name="char" id="char" required><br>
        
        <input type="submit" name="submit" value="Compter">
    </form>
</body>
</html>