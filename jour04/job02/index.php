<!--
    Le code PHP vérifie si la méthode de requête est
     GET ($_SERVER['REQUEST_METHOD'] === 'GET').

    Si c'est une requête GET, il génère le code HTML pour 
    afficher le tableau avec les en-têtes des colonnes "Argument" et "Valeur".

    En utilisant une boucle foreach, il parcourt tous les éléments de $_GET.

    À chaque itération, il vérifie si l'argument correspondant à la clé $key 
    existe en utilisant isset. Si c'est le cas, il affiche une ligne dans le tableau 
    avec la clé et la valeur correspondantes.

    Après avoir parcouru tous les arguments $_GET, il ferme les balises HTML du tableau.

    Ensuite, il affiche le formulaire HTML avec les champs <input> correspondants.
-->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo '<table>
            <thead>
                <tr>
                    <th>Argument</th>
                    <th>Valeur</th>
                </tr>
            </thead>
            <tbody>';

    foreach ($_GET as $key => $value) {
        if (isset($_GET[$key])) {
            echo '<tr>
                    <td>' . $key . '</td>
                    <td>' . $value . '</td>
                </tr>';
        }
    }

    echo '</tbody>
        </table>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire GET</title>
</head>
<body>
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="prenom" placeholder="Prénom"><br>
        <input type="text" name="nom" placeholder="Nom"><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>