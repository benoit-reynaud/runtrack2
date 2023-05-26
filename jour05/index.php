<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Changement de style</title>
    <?php
    $selectedStyle = isset($_POST['style']) ? $_POST['style'] : 'style1';
    echo '<link rel="stylesheet" type="text/css" href="' . $selectedStyle . '.css">';
    ?>
</head>
<body>
    <h1>Changement de style</h1>

    <form method="POST">
        <label for="style">Choisissez un style :</label>
        <select name="style" id="style">
            <option value="style1">Style 1</option>
            <option value="style2">Style 2</option>
            <option value="style3">Style 3</option>
        </select>
        <br>
        <input type="submit" value="Valider">
    </form>
</body>
</html>
