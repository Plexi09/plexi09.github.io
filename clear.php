<?php
session_start();
include 'db.php';

// Vérifiez si l'utilisateur est connecté en tant qu'admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit();
}

// Fonction pour supprimer tous les messages
function clearMessages($conn) {
    $stmt = $conn->prepare("DELETE FROM messages");
    if ($stmt->execute()) {
        echo "Tous les messages ont été supprimés.";
    } else {
        echo "Erreur lors de la suppression des messages.";
    }
    $stmt->close();
}

// Appel de la fonction pour supprimer les messages
clearMessages($conn);

$conn->close();
?>