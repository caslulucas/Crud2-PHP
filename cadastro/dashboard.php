<?php
  session_start();
  require_once 'acoes/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Lucas Soares">
      <title>Painel de Controle</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>
  <body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Lucas Soares</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Pesquisar" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sair</a>
    </li>
  </ul>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Painel de Controle
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastrar.php">
              <span data-feather="file"></span>
              Cadastrar
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Consultar
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Painel de Controle</h1>
          </div>
      <div id="aviso" class=""></div>
<?php
  // PEGAR MENSAGEM E ESCREVER EM DIVISORIA COM JS
  if(isset($_SESSION['mensagem'])) {
    echo "
      <script>
        let escrever = '{$_SESSION['mensagem']}';
        let msg = document.getElementById('aviso');
        msg.innerHTML = escrever;
        setInterval(function(){
          msg.innerHTML = '';
        }, 3000)
      </script>";
  }
  session_unset();
?>
      <h2>Tabela</h2>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
                // READ ler, consultar
                require_once 'acoes/read.php';
              
                while($dados = mysqli_fetch_array($resultado)) {
            ?>
            <tr>
              <td> <?= $dados['idusuarios'] ?> </td>
              <td> <?= $dados['nome'] ?> </td>
              <td> <?= $dados['email'] ?> </td>
              <td> <a href="editar.php?id=<?= $dados['idusuarios'] ?>"> <span data-feather="edit"> </span></a> </td>
              <td> <a href="acoes/deletar.php?id=<?= $dados['idusuarios'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $dados['idusuarios'] ?>"> <span data-feather="trash-2"> </span></a> </td>
            
<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $dados['idusuarios'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">APAGAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Você deseja apagar o registro <?= $dados['idusuarios'] ?> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
        <form action="acoes/deletar.php" method="POST">
          <input type="hidden" name="id" value="<?= $dados['idusuarios'] ?>">
          <button type="submit" class="btn btn-primary" name="bt_apagar" >Sim</button>
        </form>
        
      </div>
    </div>
  </div>
</div>

            </tr>
            <?php
              } // fim while
            ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="js/dashboard.js"></script>
  </body>
</html>