<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITE | GN</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            text-align: center;
            color: white;
        }
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
        }
        a{
            text-decoration: none;
            color: white;
            border: 3px solid dodgerblue;
            border-radius: 10px;
            padding: 10px;
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
        .imagem-centralizada img {
            width: 150px;     /* Tamanho pequeno */
            height: auto;     /* Mantém proporção */
            border-radius: 10px; /* Opcional: cantos arredondados */
        }
        
    
    </style>
</head>
<body style="background-image: url(ProjeJPE.png); background-size: cover;">

<video class="video-fundo" autoplay muted loop>
    <source src="Inspiration ｜ 2016 Harley-Davidson Motorcycles.mp4" type="video/mp4">
    Seu navegador não suporta vídeos HTML5.
</video>

    <div class="imagem-centralizada">
        <img src="LogoMoto.png" alt="Imagem Centralizada">
    </div>

    
    <div class="box">
        <a href="login.php">Login</a>
        <a href="formulario.php">Cadastre-se</a>
        <a href="loginadm.php">Login Adm</a>
    </div>
</body>
</html>



