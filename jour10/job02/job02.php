<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "Chapy&Lapin";
$dbname = "jour09";

try {
    // Connexion à la base de données avec PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configurer le mode d'erreur de PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour récupérer le nom et la capacité des salles
    $sql = "SELECT nom, capacite FROM salles";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        // Afficher le tableau HTML avec les résultats
        echo '<table style="border-collapse: collapse; width: 100%;">';
        echo '<thead><tr>';
        echo '<th style="border: 1px solid black; padding: 8px;">Nom</th>';
        echo '<th style="border: 1px solid black; padding: 8px;">Capacité</th>';
        echo '</tr></thead><tbody>';

        // Parcourir les lignes de résultats et afficher les données dans le tableau
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td style="border: 1px solid black; padding: 8px;">' . $row['nom'] . '</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">' . $row['capacite'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
    } else {
        echo "Aucun résultat trouvé.";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Fermer la connexion à la base de données
$conn = null;
?>