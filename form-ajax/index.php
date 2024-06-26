<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function(){
            $("form").submit(function(event){
                event.preventDefault();
                var name = $("#mail-name").val();
                var email = $("#mail-email").val();
                var gender = $("#mail-gender").val();
                var message = $("#mail-message").val();
                var submit = $("#mail-submit").val();
                $(".form-message").load("mail.php", {
                    name: name,
                    email: email,
                    gender: gender,
                    message: message,
                    submit: name
                });
            });
        });
    </script>
    <title>Ajax chat</title>
</head>

<body>
    <form action="mail.php" method="POST">
        <input id="mail-name" type="text" name="name" placeholder="Full name">
        <br>
        <input id="mail-email" type="text" name="email" placeholder="E-mail">
        <br>
        <select id="mail-gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <br>
        <textarea id="mail-message" name="message" placeholder="Message"></textarea>
        <br>
        <button id="mail-submt" type="submit" name="submit">Send email</button>
        <p class="form-message"></p>
    </form>

</body>

</html>