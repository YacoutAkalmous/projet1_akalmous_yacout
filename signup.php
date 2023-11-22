<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assurez-vous de valider et d'échapper les données pour éviter les attaques par injection SQL
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = password_hash("MAISON2023", PASSWORD_DEFAULT);  // Utilisez le mot de passe haché

    // Ajoutez la logique pour insérer les données dans la base de données (exemple)
    // Remplacez ces lignes avec la connexion à votre base de données
    $pdo = new PDO("mysql:host=localhost;dbname=votre_base_de_donnees", "votre_utilisateur", "votre_mot_de_passe");

    $query = "INSERT INTO utilisateurs (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        // Redirigez l'utilisateur vers une page de succès ou connectez-le automatiquement
        header("Location: success.php");
        exit();
    } else {
        // Gérez l'échec de l'inscription
        $error_message = "Erreur lors de l'inscription. Veuillez réessayer.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
</head>
<body>
    <h1>S'inscrire</h1>
    <?php
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>
    <form action="signup.php" method="post">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" required>

        <label for="email">Adresse e-mail:</label>
        <input type="email" name="email" required>

        <!-- Notez que le champ de mot de passe n'est pas utilisé ici pour des raisons de sécurité -->
        <!-- Utilisez plutôt le mot de passe haché directement dans la logique de traitement côté serveur -->

        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>