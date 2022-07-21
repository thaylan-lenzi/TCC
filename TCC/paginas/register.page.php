<?php
require_once '../classes/usuario.php';
require_once '../classes/conn.php';

$obju = new Usuario();
$objFcs = new Funcoes();


if(isset($_POST['btregister'])){

    if($obju->queryInsert($_POST) === 'ok'){
        header('location: ../index.php');
        session_start();
    }else{
        echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://kit.fontawesome.com/28a1cdcfb2.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://unpkg.com/jwt-decode/build/jwt-decode.js"></script>

    <script>
        function handleCredentialResponse(response) {
            const data = jwt_decode(response.credential)
            console.log(data)

        }
        window.onload = function() {
            google.accounts.id.initialize({
                client_id: "1010646460234-ocund8qtkq1i7bfjaps0s2cc0osj18uu.apps.googleusercontent.com",
                callback: handleCredentialResponse
            });
            google.accounts.id.renderButton(
                document.getElementById("buttonDiv"), {
                    theme: "outline",
                    size: "large",
                    type: "icon",
                    shape: "circle",
                    text: "$ {button.text}"
                }
            );
            google.accounts.id.prompt();
        }
    </script>
</head>

<body>
    <div id="login-container">
        <h1>Register</h1>
        <form action="" method=post>
            <label for="nome">Nome</label>
            <input name="nome" id="nome" placeholder="Digite seu nome completo" required>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Digite seu e-mail" autocomplete="off" required>
            <label for="password">Senha</label>
            <input type="password" name="senha" id="password" placeholder="Digite sua senha" required>
            <input type="submit" name="btregister" value="Registrar">
        </form>
        <div id="social-container">
        <p class="explanation container-form__item"><span>Ou cadastre-se com o Google</span></p>
            <div id="buttonDiv"></div>
        </div>
        <div id="register-container">
            <p>Já possui uma conta?</p>
            <a href="login.page.php">Entre aqui</a> 
        </div>

    </div>



</body>

</html>