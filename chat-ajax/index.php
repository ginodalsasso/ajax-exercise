<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var chatHistory = document.querySelector('.chat-messages');

            // Fonction pour charger les messages à partir du fichier PHP
            function loadMessages() {
                $(".chat-messages").load("load_messages.php"); // Charge le contenu de 'load_messages.php' dans l'élément avec la classe 'chat-messages'
            }

            loadMessages(); // Charge les messages au démarrage de la page

            // Gère la soumission du formulaire de chat
            $("form").submit(function(event) {
                event.preventDefault(); // Empêche le comportement par défaut du formulaire (rechargement de la page)
                sendMessage(); // Appelle la fonction pour envoyer le message
            });

            // Gestion de l'envoi du message lorsque l'utilisateur appuie sur la touche "Entrée"
            $("#chat-message").keydown(function(event) {
                if (event.keyCode === 13) { // Vérifie si la touche appuyée est "Entrée"
                    event.preventDefault(); // Empêche le saut de ligne dans le champ de saisie
                    sendMessage(); // Appelle la fonction pour envoyer le message
                }
            });

            // Fonction pour envoyer le message
            function sendMessage() {
                var message = $("#chat-message").val(); // Récupère la valeur du message de l'utilisateur
                // Envoie le message au serveur via une requête POST à 'send_message.php'
                $.post("send_message.php", {message: message}, function(data) {
                    $(".chat-messages").html(data); // Met à jour le contenu de 'chat-messages' avec la réponse du serveur
                    $("#chat-message").val(''); // Vide le champ de saisie du message après l'envoi
                    chatHistory.scrollTop = chatHistory.scrollHeight; // Défile vers le bas après l'envoi du message
                });
            }

            setInterval(loadMessages, 1000); // Actualise les messages toutes les 3 secondes pour afficher les nouveaux messages
        });
        F
    </script>
    <title>Ajax Chat</title>
</head>

<body>
    <div class="chat-container">
        <div class="chat-messages"></div>
        <form action="send_message.php" method="POST">
            <textarea id="chat-message" name="message" placeholder="Type your message..."></textarea>
            <button type="submit">Send</button>
        </form>
    </div>
</body>

</html>