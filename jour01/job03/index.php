<?php
// index.php

// Déclaration et initialisation des variables
$myBool = true;
$myInt = 42;
$myString = "Hello";
$myFloat = 3.14;

// Génération du tableau HTML

//gettype(). Ces fonctions renvoient le type de donnée de la variable passée en argument.

//  var_export(). Cette fonction renvoie une représentation sous forme de chaîne de 
//  caractères de la variable passée en argument. Dans ce cas, nous utilisons 
//  var_export() pour afficher la valeur booléenne de $myBool.
echo '<table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Nom</th>
                <th>Valeur</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>' . gettype($myBool) . '</td> 
                <td>myBool</td>
                <td>' . var_export($myBool, true) . '</td>
            </tr>
            <tr>
                <td>' . gettype($myInt) . '</td>
                <td>myInt</td>
                <td>' . $myInt . '</td>
            </tr>
            <tr>
                <td>' . gettype($myString) . '</td>
                <td>myString</td>
                <td>' . $myString . '</td>
            </tr>
            <tr>
                <td>' . gettype($myFloat) . '</td>
                <td>myFloat</td>
                <td>' . $myFloat . '</td>
            </tr>
        </tbody>
    </table>';
?>
