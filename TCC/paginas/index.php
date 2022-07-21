<?php
session_start();
require_once '../classes/usuario.php';
require_once '../classes/imovel.php';
$obju = new Usuario();
$obji = new Imovel();

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
  <title>Document</title>
  <link rel="stylesheet" href="../css/index.css">
  <script src="https://kit.fontawesome.com/3c2b49fcd1.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <header class="topo" id="topo">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">
        <img src="../img/logo.jpg" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="">
        .
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Comprar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="anunciar.page.php">Anunciar</a>
          </li>
          <li>
            <?php
            if (isset($_SESSION['logado'])) {
            ?>

              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa-solid fa-circle-user"><?php if (isset($_SESSION['nome'])) {
                                                        echo $_SESSION['nome'];
                                                      }   ?></i>
                </button>
                <div class="dropdown-menu">
                  <span class="dropdown-item-text"></span>
                  <a class="dropdown-item" href="#">Favoritos</a>
                  <a class="dropdown-item" href="#">Meus anuncios</a>
                  <a class="dropdown-item" href="perfil.page.php">Meu perfil</a>
                  <a class="dropdown-item" href="?sair=sim">Sair</a>
                </div>
              </div>
              </a>

            <?php
            } else {
            ?>

              <a class="nav-link dropdown" href="login.page.php">
                <?php echo 'Login'; ?>
              </a>

            <?php
            }
            ?>
          </li>
        </ul>
      </div>
    </nav>

  </header>
  <main class="conteudo">
    <section class="sessão-principal mt-5">
      <div class="div1">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="../img/test.png" alt="">
          <div class="card-body">
            <h5 class="card-title">Endereço do Imóvel</h5>
            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur voluptatem, similique amet aspernatur eos facilis ullam voluptas error molestias sit non ducimus eius quae repellendus cumque itaque sint doloribus libero!</p>
            <a href="#" class="btn btn-primary">Comprar</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="../img/test.png" alt="">
          <div class="card-body">
            <h5 class="card-title">Endereço do Imóvel</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse aperiam neque consequatur provident doloremque ab velit? Vitae inventore quisquam magnam, rerum dolorem in corporis dolores fugiat nam deserunt expedita ducimus.</p>
            <a href="#" class="btn btn-primary">Comprar</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="../img/test.png" alt="">
          <div class="card-body">
            <h5 class="card-title">Endereço do Imóvel</h5>
            <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam porro omnis reiciendis soluta rerum officiis officia sed aliquid obcaecati voluptatem doloribus molestias deleniti minus veritatis ea explicabo, in itaque ex!</p>
            <a href="#" class="btn btn-primary">Comprar</a>
          </div>
        </div>
      </div>
    </section>

  </main>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>