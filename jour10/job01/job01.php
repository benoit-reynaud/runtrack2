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

    // Requête SQL pour récupérer les informations des étudiants
    $sql = "SELECT * FROM etudiants";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        // Afficher le tableau HTML avec les résultats
        echo '<table style="border-collapse: collapse; width: 100%;">';
        echo '<thead><tr>';
        echo '<th style="border: 1px solid black; padding: 8px;">ID</th>';
        echo '<th style="border: 1px solid black; padding: 8px;">Prénom</th>';
        echo '<th style="border: 1px solid black; padding: 8px;">Nom</th>';
        echo '<th style="border: 1px solid black; padding: 8px;">Naissance</th>';
        echo '<th style="border: 1px solid black; padding: 8px;">Sexe</th>';
        echo '<th style="border: 1px solid black; padding: 8px;">Email</th>';
        echo '</tr></thead><tbody>';

        // Parcourir les lignes de résultats et afficher les données dans le tableau
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td style="border: 1px solid black; padding: 8px;">' . $row['id'] . '</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">' . $row['prenom'] . '</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">' . $row['nom'] . '</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">' . $row['naissance'] . '</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">' . $row['sexe'] . '</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">' . $row['email'] . '</td>';
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
