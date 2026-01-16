<?php
$host = "localhost";
$dbname = "grading";   // ✅ your database name
$username = "root";   // default XAMPP username
$password = "";       // default XAMPP password (empty)

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
