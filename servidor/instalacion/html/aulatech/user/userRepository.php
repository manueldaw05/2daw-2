<?php
require_once 'db/connection.php';

function getPassword(PDO $pdo, string $username)
{
    $stmt = $pdo->prepare(
        "SELECT password FROM users WHERE username = :username"
    );

    $stmt->execute([
        'username' => $username
    ]);

    return $stmt->fetchColumn();
}

function getRole(PDO $pdo, string $username) {

    $stmt = $pdo->prepare(
        "SELECT role FROM users WHERE username = :username"
    );

    $stmt->execute([
        'username' => $username
    ]);

    return $stmt->fetchColumn();
}