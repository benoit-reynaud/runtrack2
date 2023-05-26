<!--
    Le code vérifie si la méthode de requête est POST 
    ($_SERVER['REQUEST_METHOD'] === 'POST').

    S'il s'agit d'une requête POST, il initialise une variable 
    $count à 0 pour compter le nombre d'arguments.

    En utilisant une boucle foreach, il parcourt tous les éléments de $_POST.

    À chaque itération, il vérifie si l'argument correspondant à la 
    clé $key existe en utilisant isset. Si c'est le cas, il incrémente $count de 1.

    Après avoir parcouru tous les arguments $_POST, il affiche le résultat avec echo 
    en concaténant la phrase "Le nombre d'arguments POST envoyé est : " avec la valeur de $count.
-->

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = 0;

    foreach ($_POST as $key => $value) {
        if (isset($_POST[$key])) {
            $count++;
        }
    }

    echo "Le nombre d'arguments POST envoyé est : " . $count;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire POST</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="input1" placeholder="Champ 1"><br>
        <input type="text" name="input2" placeholder="Champ 2"><br>
        <input type="text" name="input3" placeholder="Champ 3"><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>