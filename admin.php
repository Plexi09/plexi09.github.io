<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration</title>
</head>
<body>
    <h2>Administration</h2>
    <a href="register.php">Ajouter un Utilisateur</a>
    <a href="logout.php">Déconnexion</a>
</body>
</html>