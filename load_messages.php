<?php
session_start();
include 'db.php';

$result = $conn->query("SELECT messages.message, messages.timestamp, users.username FROM messages JOIN users ON messages.user_id = users.id ORDER BY messages.timestamp DESC");

while ($row = $result->fetch_assoc()) {
    $time = date('H:i:s', strtotime($row['timestamp']));
    echo "<div><em>{$time}</em> <strong>{$row['username']}:</strong> {$row['message']} </div>";
}
?>