<?php
function calcule($num1, $operation, $num2) {
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            return $num1 / $num2;
        case '%':
            return $num1 % $num2;
        default:
            return "Opération non valide";
    }
}

// Exemples d'appels de la fonction calcule()
$result1 = calcule(5, '+', 3); // Addition : 5 + 3 = 8
$result2 = calcule(10, '*', 2); // Multiplication : 10 * 2 = 20
$result3 = calcule(15, '/', 4); // Division : 15 / 4 = 3.75

echo $result1 . "<br>"; // Affiche 8
echo $result2 . "<br>"; // Affiche 20
echo $result3 . "<br>"; // Affiche 3.75
?>
