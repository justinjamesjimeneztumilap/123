<?php
// MySQLi connection
$connection = new mysqli("127.0.0.1", "mariadb", "mariadb", "grading");

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Set charset to support emojis and special characters
$connection->set_charset("utf8mb4");
?>
