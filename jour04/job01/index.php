<!--
    Enregistrez ce code dans un fichier avec une extension
     .php, par exemple form.php.

    Ouvrez ce fichier dans votre navigateur en accédant à l'URL
     correspondante (par exemple, http://localhost/form.php).

    Remplissez les champs du formulaire et cliquez sur le bouton
     "Envoyer".

    Le code PHP vérifiera si la méthode de requête est GET ($_SERVER['REQUEST_METHOD'] === 'GET'). 
    S'il s'agit d'une requête GET, il comptera le nombre d'arguments $_GET à l'aide de la fonction
     count() et affichera le résultat dans la page.
-->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $count = count($_GET);
    echo "Le nombre d'arguments GET envoyés est : " . $count;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire GET</title>
</head>
<body>
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="input1" placeholder="Champ 1"><br>
        <input type="text" name="input2" placeholder="Champ 2"><br>
        <input type="text" name="input3" placeholder="Champ 3"><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>

