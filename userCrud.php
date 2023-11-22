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
        
        return false;
    }
}


function getUsers($pdo) {
    try {
        $query = "SELECT * FROM utilisateurs";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
       
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
       
        return false;
    }
}


function deleteUser($pdo, $userId) {
    try {
        $query = "DELETE FROM utilisateurs WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $userId);

        return $stmt->execute();

    } catch (PDOException $e) {
        
        return false;
    }
}
?>