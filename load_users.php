<?php
session_start();
include 'db.php';

$result = $conn->query("SELECT username FROM users WHERE online = 1");

echo "<h3>Utilisateurs en ligne:</h3>";
while ($row = $result->fetch_assoc()) {
    echo "<div>{$row['username']}</div>";
}
?>