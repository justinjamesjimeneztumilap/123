<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=grading", "root", "");
    echo "PDO MySQL driver works!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
