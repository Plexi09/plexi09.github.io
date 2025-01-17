<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chatroom</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <script>
    $(document).ready(function() {
        function loadMessages() {
            $.get("load_messages.php", function(data) {
                $("#chatbox").html(data);
            });
        }

        function loadUsers() {
            $.get("load_users.php", function(data) {
                $("#users").html(data);
            });
        }

        $("#sendMessage").on("submit", function(event) {
            event.preventDefault();
            const message = $("#message").val();
            if (message.trim() !== "") {
                $.post("send_message.php", { message: message }, function() {
                    $("#message").val("");
                    loadMessages();
                });
            }
        });

        setInterval(loadMessages, 1000);
        setInterval(loadUsers, 5000);

        loadMessages();
        loadUsers();
    });
    </script>
</head>
<body>
    <div id="chatbox"></div>
    <div id="users"></div>
    <form id="sendMessage" >
        <textarea id="message" name="message" placeholder="Entrez un message" required rows="4" cols="30">
        </textarea>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>