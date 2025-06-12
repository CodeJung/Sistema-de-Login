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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #1a1a1a, #333);
            color: white;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background-color: rgba(0,0,0,0.7);
            padding: 30px;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
        }

        .form-label {
            color: #ddd;
        }

        .btn-primary {
            width: 100%;
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
    
<div class="position-absolute top-0 start-0 m-3">
    <a href="home.php" class="btn btn-primary">Voltar</a>
</div>


<video class="video-fundo" autoplay muted loop>
    <source src="Inspiration ｜ 2016 Harley-Davidson Motorcycles.mp4" type="video/mp4">
    Seu navegador não suporta vídeos HTML5.
</video>

    <div class="login-box">
        <h2 class="text-center mb-4">Login do Administrador</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Usuário</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>

</body>
</html>
