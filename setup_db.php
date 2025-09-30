<?php

require __DIR__ ."/vendor/autoload.php";

require 'config.php';

$queries = [
    "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('member', 'officer', 'committee') DEFAULT 'member',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );",

    "CREATE TABLE IF NOT EXISTS guides (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title TEXT NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
    );",

    "CREATE TABLE IF NOT EXISTS sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    users_id INT NOT NULL,
    session_token VARCHAR(255) NOT NULL,
    expires_at DATETIME NOT NULL,
    FOREIGN KEY (users_id) REFERENCES users(id)
    );",
];

foreach ($queries as $query) { 
    $pdo->exec($query);
}

echo "Tables created successfully";

?>