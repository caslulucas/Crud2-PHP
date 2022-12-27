<?php
    session_start();
    require_once 'conexao.php';

    if(isset($_POST['bt_editar'])) {
        
        $nome  = mysqli_real_escape_string($con, $_POST['nome']);
        $email = mysqli_real_escape_string($con, $_POST['email']);

        $id = mysqli_real_escape_string($con, $_POST['id']);

        $sql = "UPDATE usuarios SET nome = '$nome', email = '$email' WHERE idusuarios = '$id'";

        if(mysqli_query($con, $sql)) {
            $_SESSION['mensagem'] = "Registro editado com sucesso!";
            header('Location: ../dashboard.php');
        } else {
            $_SESSION['mensagem'] = "Erro na edição do registro!";
            header('Location: ../dashboard.php');
        }
        // FECHAR CONEXAO
        mysqli_close($con);
    }
