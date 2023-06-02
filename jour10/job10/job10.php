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

            // En-tête du tableau
            echo '<thead><tr>';
            foreach ($result->fetch(PDO::FETCH_ASSOC) as $key => $value) {
                echo '<th style="border: 1px solid black; padding: 8px;">' . $key . '</th>';
            }
            echo '</tr></thead>';

            // Données du tableau
            echo '<tbody>';
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                foreach ($row as $value) {
                    echo '<td style="border: 1px solid black; padding: 8px;">' . $value . '</td>';
                }
                echo '</tr>';
            }
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

// Exemple d'utilisation de la fonction afficherResultats avec la requête spécifique
$sql = "SELECT * FROM salles ORDER BY capacite ASC";
$servername = "localhost";
$username = "root";
$password = "Chapy&Lapin";
$dbname = "jour09";

// Appel de la fonction pour afficher les résultats de la requête
afficherResultats($sql, $servername, $username, $password, $dbname);
?>