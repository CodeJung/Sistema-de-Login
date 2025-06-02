<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['tipo'] = 'admin'; // Define como administrador
    header('Location: index.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
</head>
<body>
    <h2>Login Administrador</h2>
    <form method="POST">
        <label>Usuário:</label>
        <input type="text" name="username" required><br><br>
        <label>Senha:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
<?php





