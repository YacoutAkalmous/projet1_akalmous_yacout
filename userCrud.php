<?php

include_once 'connexion.php';

function createUser($pdo, $username, $email, $password) {
    try {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO utilisateurs (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        return $stmt->execute();

    } catch (PDOException $e) {
        
        error_log("Erreur lors de la création d'un utilisateur : " . $e->getMessage());
        return false;
    }
}


function getUsers($pdo) {
    try {
        $query = "SELECT id, username, email FROM utilisateurs";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        
        error_log("Erreur lors de la récupération des utilisateurs : " . $e->getMessage());
        return [];
    }
}


function updateUser($pdo, $userId, $newUsername, $newEmail) {
    try {
        $query = "UPDATE utilisateurs SET username = :username, email = :email WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $newUsername);
        $stmt->bindParam(':email', $newEmail);
        $stmt->bindParam(':id', $userId);

        return $stmt->execute();

    } catch (PDOException $e) {
        
        error_log("Erreur lors de la mise à jour d'un utilisateur : " . $e->getMessage());
        return false;
    }
}

/**
 * Suppression d'un utilisateur
 */
function deleteUser($pdo, $userId) {
    try {
        $query = "DELETE FROM utilisateurs WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $userId);

        return $stmt->execute();

    } catch (PDOException $e) {
        
        error_log("Erreur lors de la suppression d'un utilisateur : " . $e->getMessage());
        return false;
    }
}

?>