<?php
session_start();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['tipo'] = 'usuario'; // Define como usuário comum
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login Usuário</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            margin: 0;
        }
        .box {
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            border-radius: 15px;
            color: #fff;
        }
        input {
            padding: 15px;
            margin-bottom: 10px;
            border: none;
            font-size: 15px;
            width: 100%;
        }
        .inputSubmit {
            background-color: dodgerblue;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            cursor: pointer;
        }
        .inputSubmit:hover {
            background-color: deepskyblue;
        }
        a {
            color: white;
            margin: 20px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <a href="home.php">Voltar</a>
    <div class="box">
        <h1>Login Usuário</h1>
        <form method="POST">
            <input type="text" name="email" placeholder="Email" required><br>
            <input type="password" name="senha" placeholder="Senha" required><br>
            <input type="submit" class="inputSubmit" value="Entrar">
        </form>
    </div>
</body>
</html>
