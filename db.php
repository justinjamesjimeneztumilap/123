<?php
// Database credentials
define('DB_HOST', 'localhost');   // Replace with your host
define('DB_NAME', 'your_db_name'); // Replace with your database name
define('DB_USER', 'your_db_user'); // Replace with your database username
define('DB_PASS', 'your_db_pass'); // Replace with your database password

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
