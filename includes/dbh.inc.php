<?php

$host = 'localhost';
$dbname = 'login_system_db';
$dbusername = 'root';
$dbpassword = '';

try {
    $pdo = new PDO("mysql:host=$host; dbname=$dbname", $dbusername,
        $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// sql to create table
/*CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
pwd VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)*/
