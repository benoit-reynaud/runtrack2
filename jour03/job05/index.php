<?php
$str = "On n’est pas le meilleur quand on le croit mais quand on le sait";

$dic = array(
    "consonnes" => 0,
    "voyelles" => 0
);

for ($i = 0; isset($str[$i]); $i++) {
    $char = strtolower($str[$i]);
    if (ctype_alpha($char)) {
        if (in_array($char, array('a', 'e', 'i', 'o', 'u', 'y'))) {
            $dic["voyelles"]++;
        } else {
            $dic["consonnes"]++;
        }
    }
}

echo '<table>';
echo '<thead><tr><th>Voyelles</th><th>Consonnes</th></tr></thead>';
echo '<tbody><tr><td>' . $dic["voyelles"] . '</td><td>' . $dic["consonnes"] . '</td></tr></tbody>';
echo '</table>';
?>
