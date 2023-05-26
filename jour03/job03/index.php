<?php
$str = "I'm sorry Dave I'm afraid I can't do that";
$vowels = array("a", "e", "i", "o", "u", "y", "A", "E", "I", "O", "U", "Y");

for ($i = 0; isset($str[$i]); $i++) {
    $char = $str[$i];
    if (in_array($char, $vowels)) {
        echo $char;
    }
}
?>
