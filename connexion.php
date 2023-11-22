<?php
$host = 'localhost';
$port = '8889'; 
$dbname = 'ecom1_projet';
$user = 'root';
$password = '';

$socket = '/Applications/MAMP/tmp/mysql/mysql.sock';


try {
    // Création de l'instance PDO
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);

    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>