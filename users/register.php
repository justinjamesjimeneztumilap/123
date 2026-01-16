<?php
$first = $_POST['first_name'];
$last  = $_POST['last_name'];
$usern = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users 
(first_name, last_name, username, email, password_hash, phone)
VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $pdo->prepare($sql);
$stmt->execute([$first, $last, $usern, $email, $pass, $phone]);
?>
