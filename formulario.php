<?php
if (isset($_POST['submit'])) {
    include_once('config.php');

    // Proteção básica contra SQL injection
    $nome  = mysqli_real_escape_string($conexao, $_POST['nome']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $moto  = mysqli_real_escape_string($conexao, $_POST['moto']);
    $cargo = mysqli_real_escape_string($conexao, $_POST['cargo']);

    $query = "INSERT INTO usuarios(nome, senha, email, moto, cargo) 
              VALUES ('$nome', '$senha', '$email', '$moto', '$cargo')";

    if (mysqli_query($conexao, $query)) {
        header('Location: login.php');
        exit;
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário | GN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }
        .box {
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 25px;
            border-radius: 15px;
            width: 300px;
        }
        fieldset {
            border: 2px solid dodgerblue;
            padding: 15px;
        }
        legend {
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
            font-weight: bold;
        }
        .inputBox {
            position: relative;
            margin-bottom: 20px;
        }
        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput {
            position: absolute;
            top: 0;
            left: 0;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput {
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        .video-fundo {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            z-index: -1;
            filter: brightness(0.4);
        }
    </style>
</head>
<body>

<!-- Vídeo de fundo -->
<video class="video-fundo" autoplay muted loop>
    <source src="Inspiration ｜ 2016 Harley-Davidson Motorcycles.mp4" type="video/mp4">
    Seu navegador não suporta vídeos HTML5.
</video>

<!-- Botão Voltar -->
<div class="position-absolute top-0 start-0 m-3">
    <a href="home.php" class="btn btn-primary">Voltar</a>
</div>

<!-- Formulário -->
<div class="box">
    <form action="formulario.php" method="POST">
        <fieldset>
            <legend>Formulário de Clientes</legend>
            <div class="inputBox">
                <input type="text" name="nome" id="nome" class="inputUser" required>
                <label for="nome" class="labelInput">Nome completo</label>
            </div>
            <div class="inputBox">
                <input type="password" name="senha" id="senha" class="inputUser" required>
                <label for="senha" class="labelInput">Senha</label>
            </div>
            <div class="inputBox">
                <input type="text" name="email" id="email" class="inputUser" required>
                <label for="email" class="labelInput">Email</label>
            </div>
            <div class="inputBox">
                <input type="text" name="moto" id="moto" class="inputUser" required>
                <label for="moto" class="labelInput">Moto</label>
            </div>
            <div class="inputBox">
                <input type="text" name="cargo" id="cargo" class="inputUser" required>
                <label for="cargo" class="labelInput">Cargo</label>
            </div>
            <div class="text-center">
                <input type="submit" name="submit" class="btn btn-success mt-2" value="Enviar">
            </div>
        </fieldset>
    </form>
</div>

</body>
</html>
