<?php
include 'db.php';

// Vérifiez si un utilisateur admin existe déjà
$result = $conn->query("SELECT * FROM users WHERE is_admin = 1");
if ($result->num_rows == 0) {
    // Aucun utilisateur admin trouvé, ajout du premier utilisateur admin
    $username = 'PE';
    $password = password_hash('Plexi2019', PASSWORD_BCRYPT); // Remplacez 'monmotdepasse' par le mot de passe souhaité

    $stmt = $conn->prepare("INSERT INTO users (username, password, is_admin) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $username, $password, $is_admin);
    $is_admin = 1;

    if ($stmt->execute()) {
        echo "Utilisateur admin ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'utilisateur admin.";
    }
} else {
    echo "Un utilisateur admin existe déjà.";
}
?>