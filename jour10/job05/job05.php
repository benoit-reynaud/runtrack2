<?php
// Fonction pour exécuter une requête SQL et afficher les résultats dans un tableau HTML
function afficherResultats($sql, $servername, $username, $password, $dbname) {
    try {
        // Connexion à la base de données avec PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configurer le mode d'erreur de PDO sur Exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Exécution de la requête SQL
        $result = $conn->query($sql);

        if ($result->rowCount() > 0) {
            // Afficher le tableau HTML avec les résultats
            echo '<table style="border-collapse: collapse; width: 100%;">';
            echo '<thead><tr>';
            foreach ($result->fetch(PDO::FETCH_ASSOC) as $key => $value) {
                echo '<th style="border: 1px solid black; padding: 8px;">' . $key . '</th>';
            }
            echo '</tr></thead><tbody>';

            // Parcourir les lignes de résultats et afficher les données dans le tableau
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
    }
    catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}

/*l'ensemble des informations des étudiants qui ont plus de 18 ans :*/
/* 6570 correspond approximativement à 18 ans (365 jours par an multiplié par 18)*/
$sql = "SELECT * FROM etudiants WHERE DATEDIFF(CURDATE(), naissance) >= 6570";
$servername = "localhost";
$username = "root";
$password = "Chapy&Lapin";
$dbname = "jour09";

// Appel de la fonction pour afficher les résultats de la requête
afficherResultats($sql, $servername, $username, $password, $dbname);
?>
