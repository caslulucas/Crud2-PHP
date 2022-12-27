<?php
    session_start();
    require_once 'conexao.php';

    if(isset($_POST['bt_cadastrar'])) {
        $nome  = mysqli_real_escape_string($con, $_POST['nome']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $senha = md5(mysqli_real_escape_string($con, $_POST['senha']));
        // CREATE criar, inserir
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome','$email','$senha')";

        if(mysqli_query($con, $sql)) {
            $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
            header('Location: ../dashboard.php');
        } else {
            $_SESSION['mensagem'] = "Erro no cadastro!";
            header('Location: ../dashboard.php');
        }
        // FECHAR CONEXAO
        mysqli_close($con);
    }
