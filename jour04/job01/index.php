<?php>
$count = 0;

foreach ($_GET as $key => $value) {
    if (isset($_GET[$key])) {
        $count++;
    }
}

echo "Le nombre d'arguments GET envoyé est : " . $count;
?>
