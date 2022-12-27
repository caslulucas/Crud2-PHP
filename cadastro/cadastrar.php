<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Edson Maia">
      <title>Cadastrar Usuário</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      
      <h2>Cadastrar Usuário</h2>
      
    </div>

      <div class="col-md-6 col-lg-12">
        <form class="needs-validation" novalidate action="acoes/create.php" method="POST">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="nome" class="form-label">Nome completo</label>
              <input type="text" class="form-control" name="nome" id="nome" autofocus required>
              <div class="invalid-feedback">
                Digite o seu nome completo.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control" name="email" id="email" required>
              <div class="invalid-feedback">
                Digite um e-mail válido.
              </div>
            </div>

            <div class="col-12">
              <label for="senha" class="form-label">Senha</label>
              <input type="password" class="form-control" name="senha" id="senha" required>
              <div class="invalid-feedback">
                Por favor digite uma senha.
              </div>
            </div>

            <div class="col-12">
              <label for="confsenha" class="form-label">Confirma Senha</label>
              <input type="password" class="form-control" name="confsenha" id="confsenha" required>
              <div class="invalid-feedback">
                Por favor digite a confirmação da senha.
              </div>
            </div>

          </div>
            <br>
          <button class="w-100 btn btn-primary btn-lg" type="submit" name="bt_cadastrar">Cadastrar</button>

        </form>
      </div>
    </div>
  </main>

</div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/form-validation.js"></script>
  </body>
</html>