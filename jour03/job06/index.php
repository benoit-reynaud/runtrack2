<?php
$str = "Les choses que l'on possède finissent par nous posséder.";
$reversedStr = '';

for ($i = strlen($str) - 1; isset($str[$i]); $i--) {
    $reversedStr .= $str[$i];
}

echo $reversedStr;
?>
