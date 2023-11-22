<?php
// Inclure le fichier de connexion
include_once 'connexion.php';

// Fonction pour récupérer tous les produits depuis la base de données
function getProducts($pdo) {
    try {
        $query = "SELECT * FROM produits";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}


$products = getProducts($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAISONB</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>MAISONB</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="login.php">Se connecter</a></li>
                <li><a href="signup.php">S'inscrire</a></li>
            </ul>
            <a href="cart.php">Panier</a>
        </nav>
    </header>

    <section class="products">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['nom']; ?>">
                <h2><?php echo $product['nom']; ?></h2>
                <p><?php echo $product['description']; ?></p>
                <p>Prix: <?php echo $product['prix']; ?> $</p>
                <a href="addToCart.php?id=<?php echo $product['id']; ?>">Ajouter au panier</a>
            </div>
        <?php endforeach; ?>
    </section>

    <footer>
        <div>
            <h5>Contactez-nous</h5>
            <p>Email: contact@MAISONB.com</p>
            <p>Téléphone: +1 182 468 2424</p>
        </div>
        <div>
            <h5>Liens rapides</h5>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Produits</a></li>
                <li><a href="#">Catégories</a></li>
                <li><a href="#">Panier</a></li>
            </ul>
        </div>
        <div>
            <h5>Suivez-nous</h5>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>
        <div>
            <p>&copy; 2023 MAISONB. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>