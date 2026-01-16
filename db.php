<?php
define('DB_HOST', 'localhost'); // XAMPP host or your DB host
define('DB_NAME', 'grading');   // Your database name
define('DB_USER', 'root');      // DB username
define('DB_PASS', '');          // DB password (empty for XAMPP)

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
