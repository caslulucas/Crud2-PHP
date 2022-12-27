<?php
    // READ = ler, consultar
    $sql = "SELECT * from usuarios";
    $resultado = mysqli_query($con, $sql);
    // usar $dados = mysqli_fetch_array($resultado)
    // dentro de um laço enquanto para escrever
