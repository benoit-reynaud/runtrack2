<?php
function estPremier($nombre) {
    if ($nombre < 2) {
        return false;
    }
    
    for ($i = 2; $i <= sqrt($nombre); $i++) {
        if ($nombre % $i == 0) {
            return false;
        }
    }
    
    return true;
}

for ($nombre = 2; $nombre <= 1000; $nombre++) {
    if (estPremier($nombre)) {
        echo $nombre . "<br />";
    }
}
?>
