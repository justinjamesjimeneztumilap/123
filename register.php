<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once __DIR__ . "/database/db.php";

$message = "";

if (isset($_POST['register'])) {
    $first = trim($_POST['first_name']);
    $last = trim($_POST['last_name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);

    if ($stmt->rowCount() > 0) {
        $message = "Username or email already exists!";
    } else {
        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, username, email, phone, password_hash) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$first, $last, $username, $email, $phone, $password_hash])) {
            $message = "Registration successful! You can now log in.";
        } else {
            $message = "Registration failed!";
        }
    }
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
