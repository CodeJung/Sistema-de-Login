<?php 
session_start();

// Redireciona se não estiver logado
if (!isset($_SESSION['tipo'])) {
    header('Location: login.php');
    exit;
}

$admin = ($_SESSION['tipo'] === 'admin');

// Inicializa os eventos
if (!isset($_SESSION['eventos'])) {
    $_SESSION['eventos'] = [
        ["nome" => "Encontro Nacional de Motociclistas", "descricao" => "Evento anual com centenas de motos.", "imagem" => "a.jpg", "id" => "evento1"],
        ["nome" => "Passeio Serra do Mar", "descricao" => "Viagem em grupo pelas montanhas.", "imagem" => "b.jpg", "id" => "evento2"],
        ["nome" => "Noite do Rock & Moto", "descricao" => "Show de rock e exposição de motos clássicas.", "imagem" => "c.jpg", "id" => "evento3"],
    ];
}

// Atualiza os eventos se o admin enviou POST
if ($admin && $_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_SESSION['eventos'] as &$evento) {
        $id = $evento['id'];
        if (isset($_POST["nome_$id"], $_POST["descricao_$id"])) {
            $evento['nome'] = $_POST["nome_$id"];
            $evento['descricao'] = $_POST["descricao_$id"];
        }
    }
    unset($evento);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Tratamento do botão Inscrever-se para usuário normal
if (!$admin && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inscrever_evento'])) {
    $evento_id = $_POST['inscrever_evento'];
    // Aqui você pode implementar a lógica para salvar a inscrição no banco ou sessão
    $_SESSION['msg'] = "Você se inscreveu no evento: " . htmlspecialchars($evento_id);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Eventos Moto Clube</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #121212;
            color: #f5f5f5;
            margin: 0;
            padding: 0;
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

        .container {
            padding: 60px 20px;
        }

        .container.admin-mode {
            overflow-x: auto;
        }

        /* ADMIN form styles */
        .form-admin {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            justify-content: center;
        }

        /* CARD ESTILO PARA USUÁRIO NORMAL */

        .card {
            background-color: #1f1f1f;
            border-radius: 16px;
            width: 320px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.5);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(255, 102, 0, 0.7);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 3px solid #ff6600;
        }

        .card-content {
            flex-grow: 1;
            padding: 20px;
            color: #ddd;
        }

        .card-content h2 {
            font-size: 22px;
            margin: 0 0 10px;
            color: #ff6600;
        }

        .card-content p {
            font-size: 15px;
            line-height: 1.5;
            color: #bbb;
            white-space: pre-line;
        }

        .inscrever-form {
            padding: 0 20px 20px;
            display: flex;
            justify-content: center;
        }

        .btn-inscrever {
            background-color: #ff6600;
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px 36px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 4px 12px rgba(255, 102, 0, 0.7);
            transition: background-color 0.25s ease, box-shadow 0.25s ease;
        }

        .btn-inscrever:hover {
            background-color: #e65c00;
            box-shadow: 0 6px 20px rgba(230, 92, 0, 0.9);
        }

        /* ESTILOS ADMIN */

        .form-admin .card {
            width: 300px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
        }

        .form-admin .card input[type="text"],
        .form-admin .card textarea {
            background-color: #2c2c2c;
            color: #fff;
            border: 1px solid #444;
            border-radius: 6px;
            padding: 10px;
            margin-top: 8px;
            font-size: 14px;
            width: 100%;
            resize: vertical;
        }

        .btn-salvar {
            margin-top: 20px;
            align-self: center;
            padding: 12px 24px;
            background-color: #ff6600;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-salvar:hover {
            background-color: #e65c00;
        }

        ::placeholder {
            color: #aaa;
        }

        /* MENSAGEM */
        .msg-sucesso {
            background:#0a0; 
            color:#fff; 
            padding:10px; 
            margin: 10px auto 30px;
            width: 320px; 
            border-radius: 8px; 
            text-align: center;
            font-weight: 600;
            box-shadow: 0 0 10px #0a0;
        }
    </style>
</head>
<body>

<video class="video-fundo" autoplay muted loop>
    <source src="Inspiration ｜ 2016 Harley-Davidson Motorcycles.mp4" type="video/mp4">
    Seu navegador não suporta vídeos HTML5.
</video>

<div class="container <?= $admin ? 'admin-mode' : '' ?>">

    <?php if ($admin): ?>
        <form method="POST" class="form-admin">
            <div class="card-container">
                <?php foreach ($_SESSION['eventos'] as $evento): ?>
                    <div class="card">
                        <img src="<?= htmlspecialchars($evento['imagem']) ?>" alt="Imagem do evento <?= htmlspecialchars($evento['nome']) ?>">
                        <input type="text" name="nome_<?= $evento['id'] ?>" value="<?= htmlspecialchars($evento['nome']) ?>" required>
                        <textarea name="descricao_<?= $evento['id'] ?>" rows="4" required><?= htmlspecialchars($evento['descricao']) ?></textarea>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="submit" class="btn-salvar">Salvar Alterações</button>
        </form>
    <?php else: ?>
        <?php if (isset($_SESSION['msg'])): ?>
            <div class="msg-sucesso"><?= $_SESSION['msg'] ?></div>
            <?php unset($_SESSION['msg']); ?>
        <?php endif; ?>

        <div class="card-container">
            <?php foreach ($_SESSION['eventos'] as $evento): ?>
                <div class="card">
                    <img src="<?= htmlspecialchars($evento['imagem']) ?>" alt="Imagem do evento <?= htmlspecialchars($evento['nome']) ?>">
                    <div class="card-content">
                        <h2><?= htmlspecialchars($evento['nome']) ?></h2>
                        <p><?= nl2br(htmlspecialchars($evento['descricao'])) ?></p>
                    </div>
                    <form method="POST" class="inscrever-form">
                        <input type="hidden" name="inscrever_evento" value="<?= htmlspecialchars($evento['id']) ?>">
                        <button type="submit" class="btn-inscrever">Inscrever-se</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
