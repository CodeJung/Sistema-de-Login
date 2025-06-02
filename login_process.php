<?php
session_start();
require 'paineladm.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Protege contra SQL Injection
$stmt = $conexao->prepare("SELECT * FROM admins WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_username'] = $username;
    header("Location: index.php");
    exit();
} else {
    echo "Usuário ou senha inválidos.";
}
?>
