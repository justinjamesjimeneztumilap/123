<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection
require_once __DIR__ . "/database/db.php"; // Adjust path if needed

$message = "";

if (isset($_POST['register'])) {
    $first = trim($_POST['first_name']);
    $last = trim($_POST['last_name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Check if username or email exists
    $stmt = $connection->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $message = "Username or email already exists!";
    } else {
        // Insert new user
        $stmt = $connection->prepare("INSERT INTO users (first_name, last_name, username, email, phone, password_hash) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $first, $last, $username, $email, $phone, $password_hash);

        if ($stmt->execute()) {
            $message = "Registration successful! You can now log in.";
        } else {
            $message = "Registration failed: " . $stmt->error;
        }
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h2>Register</h2>

<?php if ($message) echo "<p class='message'>$message</p>"; ?>

<form method="POST">
    <input type="text" name="first_name" placeholder="First Name" required><br>
    <input type="text" name="last_name" placeholder="Last Name" required><br>
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="text" name="phone" placeholder="Phone"><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" name="register" value="Register">
</form>

<p><a href="index.php">Back to Home</a></p>

</body>
</html>
