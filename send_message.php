<?php
session_start();
include 'db.php';

if (isset($_POST['message'])) {
    $user_id = $_SESSION['user_id'];
    $message = $_POST['message'];
    
    $stmt = $conn->prepare("INSERT INTO messages (user_id, message) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $message);
    $stmt->execute();
}
?>