<?php
session_start();
require_once '../classes/conn.php';
require_once '../classes/usuario.php';
require_once '../classes/imovel.php';
$obju = new Usuario();
$objf = new Imovel();
$objFcs = new Funcoes();

if (isset($_SESSION["logado"])) {
  $obju->usuarioLogado($_SESSION['id']);
} else {
  header("location: login.page.php");
}
//deslogar

if (isset($_GET['sair']) == "sim") {
  session_destroy();
  header('location: index.php');
}
//cadastrar imovel
if (isset($_POST['btregisterimovel'])) {
  if ($objf->queryInsert($_POST) === 'ok') {
    header('location: ../index.php');
  } else {
    echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
  }
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/3c2b49fcd1.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/anunciar.css">
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

    <div class="d-grid gap-3 col-6 mx-auto">
      <div class="mt-3">
        <h5>O que você deseja fazer?</h5>
      </div>

      <div class="d-grid mb-3">
        <select name="situacao" class="form-select" aria-label="Default select example">
          <option>Vender</option>
          <option>Alugar</option>
        </select>
      </div>

    </div>

    <div class="d-grid gap-3 col-6 mx-auto mb-3">
      <div>
        <h5>Qual é o tipo do seu imóvel?</h5>
      </div>

      <div class="d-grid">
        <select name="tipo" class="form-select" aria-label="Default select example">
          <option>Apartamento</option>
          <option>Casa</option>
          <option>Casa de condominio</option>
          <option>Lote e/ou Terreno</option>
        </select>
      </div>

      <div class="d-grid gap-2">
        <select name="tipo2" class="form-select" aria-label="Default select example">
          <option>Padrão</option>
          <option>Kitnet</option>
          <option>Studio</option>
        </select>
      </div>
    </div>

    <div class="d-grid gap-2 col-6 mx-auto mb-3">
      <label for="inputCEP">CEP</label>
      <input name="cep" maxlength="9" type="tel" class="form-control" id="inputCEP" placeholder="00000-000" required>
    </div>

    <div class="d-grid gap-2 col-6 mx-auto mb-3">
      <label for="inputAddress">Endereço</label>
      <input type="text" name="endereco" class="form-control" id="inputEndereco" placeholder="Ex. Rua Getúlio Vargas" required>
    </div>

    <div class="d-grid gap-2 col-6 mx-auto mb-3">
      <label for="inputCEP">Bairro</label>
      <input name="bairro" type="text" class="form-control" id="inputBairro" placeholder="Ex. Araponguinhas" required>
    </div>

    <div>
      <div class="d-grid gap-2 col-6 mx-auto mb-3">
        <label for="inputCidade">Cidade</label>
        <input type="text" name="cidade" class="form-control" id="inputCidade" placeholder="Ex. Timbó" required>
      </div>

      <div class="d-grid gap-2 col-6 mx-auto mb-3">
        <label for="inputEstado">Estado</label>
        <select name="estado" class="form-select" aria-label="Default select example">
          <option>AC</option>
          <option>AL</option>
          <option>AP</option>
          <option>AM</option>
          <option>BA</option>
          <option>CE</option>
          <option>DF</option>
          <option>ES</option>
          <option>GO</option>
          <option>MA</option>
          <option>MT</option>
          <option>MS</option>
          <option>MG</option>
          <option>PA</option>
          <option>PB</option>
          <option>PR</option>
          <option>PE</option>
          <option>PI</option>
          <option>RJ</option>
          <option>RN</option>
          <option>RS</option>
          <option>RO</option>
          <option>RR</option>
          <option>SC</option>
          <option>SP</option>
          <option>SE</option>
          <option>TO</option>
        </select>
      </div>
    </div>

    <div>
      <div class="d-grid gap-2 col-6 mx-auto mb-3">
        <label for="inputNumber">Número</label>
        <input type="number" name="numero_casa" class="form-control" id="inputNumero" placeholder="Ex. 1" required>
      </div>

      <div class="d-grid gap-2 col-6 mx-auto mb-3">
        <label for="inputCity">Complemento (Opcional)</label>
        <input type="text" name="complemento" class="form-control" id="inputComplemento" placeholder="Ex. Apto 110, Bloco A" required>
      </div>

      <div class="d-grid gap-2 col-6 mx-auto mb-3">
        <label for="inputCity">Area útil (m²)</label>
        <input type="text" name="area_util" class="form-control" id="inputArea_util" placeholder="Ex. 60.00" required>
      </div>

      <div class="d-grid gap-2 col-6 mx-auto mb-3">
        <label for="inputCity">Area total (m²)</label>
        <input type="text" name="area_total" class="form-control" id="inputArea_total" placeholder="Ex. 180.00" required>
      </div>

      <div class="d-grid gap-2 col-6 mx-auto mb-3">
        <label for="inputNumero_quarto">Quantidade de quartos</label>
        <input type="number" name="numero_quarto" class="form-control" id="inputNumero_quarto" placeholder="Ex. 5" required>
      </div>

      <div class="d-grid gap-2 col-6 mx-auto mb-3">
        <label for="inputCity">Quantidade de banheiros</label>
        <input type="number" name="numero_banheiro" class="form-control" id="inputNumero_banheiro" placeholder="Ex. 2" required>
      </div>

      <div class="d-grid gap-2 col-6 mx-auto mb-3">
        <label for="inputCity">Quantidade de garagem</label>
        <input type="number" name="numero_garagem" class="form-control" id="inputNumero_garagem" placeholder="Ex. 1" required>
      </div>

      <div class="d-grid gap-2 col-6 mx-auto mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
        <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
    </div>

    <div class="d-grid gap-3 col-6 mx-auto mb-3">
      <input class="btn btn-primary" type="submit" name="btregisterimovel"></input>
    </div>
  </form>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>