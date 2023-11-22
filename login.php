<?php
session_start();


if (isset($_SESSION['user'])) {
    header("Location: profil.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter - MAISON B</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>MAISON B</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="login.php">Se connecter</a></li>
                <li><a href="signup.php">S'inscrire</a></li>
                
            </ul>
            <a href="cart.php">Panier</a>
        </nav>
    </header>

    <section class="login-form">
        <h2>Se connecter</h2>
        <form action="login.php" method="post">
            
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" required>

            <label for="password">Mot de passe</label>
            <input type="password" name="password" required>

            <button type="submit">Se connecter</button>
        </form>
    </section>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Votre Boutique en Ligne. Tous droits réservés.</p>
    </footer>
</body>
</html>