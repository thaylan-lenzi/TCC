<?php

session_start();
require_once '../classes/conn.php';
require_once '../classes/usuario.php';
$obju = new Usuario();

if (isset($_SESSION['logado'])) {
  $obju->usuarioLogado($_SESSION['id']);
}


if (isset($_GET['sair']) == "sim") {
  session_destroy();
  header('location: index.php');
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/perfil.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/3c2b49fcd1.js" crossorigin="anonymous"></script>
  <title>Document</title>
</head>

<body>
  <header class="topo" id="topo">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">
        <img src="../img/logo.jpg" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="">
        TCC
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Central de ajuda</a>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-circle-user"><?php if (isset($_SESSION['nome'])) {
                                                      echo $_SESSION['nome'];
                                                    }   ?></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Favoritos</a></li>
                <li><a class="dropdown-item" href="#">Meus anuncios</a></li>
                <li><a class="dropdown-item" href="perfil.page.php">Meu perfil</a></li>
                <li><a class="dropdown-item" href="?sair=sim">Sair</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <form action="" method=post class="container border">

    <div class="d-grid gap-2 col-6 mx-auto mb-3">
      <label for="inputCEP">Nome</label>
      <input name="nome" maxlength="9" type="text" class="form-control" id="inputCEP" value="<?php echo $_SESSION['nome']; ?>" required>
    </div>

    <div class="d-grid gap-2 col-6 mx-auto mb-3">
      <label for="inputAddress">Email</label>
      <input type="email" name="email" class="form-control" id="inputEndereco" value="<?php echo $_SESSION['email']; ?>" required>
    </div>

    <div class="d-grid gap-3 col-6 mx-auto mt-3">
      <input class="btn btn-primary" type="submit" name="btupdate"></input>
    </div>

  </form>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>