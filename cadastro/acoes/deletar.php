<?php
  session_start();
  require_once 'conexao.php';
  
  if(isset($_POST['bt_apagar'])) {
    // DELETE Deletar, apagar
    $id = mysqli_real_escape_string($con, $_POST['id']);

    $sql = "DELETE FROM usuarios WHERE idusuarios = '$id'";
    
    if(mysqli_query($con, $sql)) {
      $_SESSION['mensagem'] = "Registro apagado com sucesso!";
      header('Location: ../dashboard.php');
    } else {
      $_SESSION['mensagem'] = "Não foi possível apagar o registro!";
      header('Location: ../dashboard.php');
    }
    // FECHAR CONEXAO
    mysqli_close($con);
  }
?>

</html>