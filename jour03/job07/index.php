<?php
$str = "Certaines choses changent, et d'autres ne changeront jamais.";
$length = strlen($str);

if ($length > 0) {
    $newStr = $str[$length - 1];  // Placer le dernier caractère au début de la nouvelle chaîne

    for ($i = 0; isset($str[$i]); $i++) {
        $nextIndex = ($i + 1) % $length;  // Obtenir l'index du caractère suivant en bouclant
        $newStr .= $str[$nextIndex];
    }

    echo $newStr;
}
?>
