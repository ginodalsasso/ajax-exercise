<?php
include 'db.php'; // Inclut le fichier de connexion à la base de données

if(isset($_POST["message"])) { 
    $message = $conn->real_escape_string($_POST["message"]); // Échappe les caractères spéciaux dans le message
    if(!empty($message)) { // Vérifie si le message n'est pas vide
        $sql = "INSERT INTO messages (message) VALUES ('$message')"; // Requête pour insérer le message dans la table
        if ($conn->query($sql) === TRUE) { // Exécute la requête
            include 'load_messages.php'; // Charge les messages après l'insertion
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error; // si l'insertion échoue
        }
    }
} else {
    echo "Erreur";
}
?>
