
<?php

if(isset($_POST['submit']))
{
     print_r('Nome: ' . $_POST['nome']);
     print_r('<br>');
     print_r('Moto: ' . $_POST['moto']);
     print_r('<br>');
     print_r('Cargo: ' . $_POST['cargo']);
     print_r('<br>');
     print_r('Senha: ' . $_POST['senha']);
     print_r('<br>');
     print_r('email: ' . $_POST['email']);
     print_r('<br>');
    
    include_once('config.php');

    $nome = $_POST['nome'];
    $moto = $_POST['moto'];
    $cargo = $_POST['cargo'];
    
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,moto,cargo,senha,email) 
    VALUES ('$nome','$senha','$email','$moto','$cargo')");

    header('Location: login.php');
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | GN</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }

    </style>
</head>
<body style="background-image: url(ProjeJPE.png); background-size: cover;">
<a href="home.php">Voltar</a>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="moto" id="moto" class="inputUser" required>
                    <label for="moto" class="labelInput">Moto</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="cargo" id="cargo" class="inputUser" required>
                    <label for="cargo" class="labelInput">Cargo</label>
                </div>
                <br><br>
               
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>