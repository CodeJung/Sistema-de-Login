<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $moto = $_POST['moto'];
        $cargo = $_POST['cargo'];

        
        $sqlInsert = "UPDATE usuarios 
        SET nome='$nome',senha='$senha',email='$email',moto='$moto',cargo='$cargo'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: sistema.php');

?>