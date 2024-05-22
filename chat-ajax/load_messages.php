<?php
include 'db.php'; // Inclut le fichier de connexion à la base de données

$sql = "SELECT * FROM messages ORDER BY timestamp ASC"; // Requête pour sélectionner tous les messages, triés par date décroissante
$result = $conn->query($sql); // Exécute la requête

if ($result->num_rows > 0) { // Vérifie s'il y a des résultats
    while($row = $result->fetch_assoc()) { // Parcourt chaque ligne du résultat
        echo "<p>" . htmlspecialchars($row["message"]) . " <span>(" . $row["timestamp"] . ")</span></p>"; // Affiche le message et l'horodatage
    }
} else {
    echo "Aucun message.";
}
?>
