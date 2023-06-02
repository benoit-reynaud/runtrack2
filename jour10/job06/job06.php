<?php
function afficherResultats($sql, $servername, $username, $password, $dbname) {
    try {
        // Connexion à la base de données avec PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configurer le mode d'erreur de PDO sur Exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Exécution de la requête SQL
        $result = $conn->query($sql);

        if ($result !== false) {
            // Afficher le tableau HTML avec les résultats
            echo '<table style="border-collapse: collapse; width: 100%;">';
            echo '<thead><tr>';
            
            // Afficher le nom du champ
            $fields = $result->fetch(PDO::FETCH_ASSOC);
            echo '<th style="border: 1px solid black; padding: 8px;">' . array_keys($fields)[0] . '</th>';
            
            echo '</tr></thead><tbody>';

            // Afficher la valeur du champ
            echo '<tr>';
            echo '<td style="border: 1px solid black; padding: 8px;">' . reset($fields) . '</td>';
            echo '</tr>';

            echo '</tbody></table>';
        } else {
            echo "Aucun résultat trouvé.";
        }

        // Fermer la connexion à la base de données
        $conn = null;
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}


/* Compter le nombre d'étudiants :*/
$sql = "SELECT COUNT(*) AS nombre_etudiants FROM etudiants;";
$servername = "localhost";
$username = "root";
$password = "Chapy&Lapin";
$dbname = "jour09";

// Appel de la fonction pour afficher les résultats de la requête
afficherResultats($sql, $servername, $username, $password, $dbname);
?>

