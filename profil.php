<?php
session_start();


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}


$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - MAISON B</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>MAISON B</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="logout.php">Se déconnecter</a></li>
                
            </ul>
            <a href="cart.php">Panier</a>
        </nav>
    </header>

    <section class="user-profile">
        <h2>Bienvenue, <?php echo $user['username']; ?>!</h2>
        
    </section>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Votre Boutique en Ligne. Tous droits réservés.</p>
    </footer>
</body>
</html>