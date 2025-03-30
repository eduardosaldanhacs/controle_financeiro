<?php
include('../includes/essenciais.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= SITE ?>css/style.css">

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
        window.history.forward();

        function noBack() {
            window.history.forward();
        }

        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function() {
            history.pushState(null, null, document.URL);
        });
    </script>
</head>
<body class="bg-1" onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">
    <div class="container">
        <div class="text-start py-5">
            <div class="row align-items-stretch d-flex justify-xxl-content-between justify-xl-content-between justify-lg-content-between justify-md-content-between justify-sm-content-center justify-content-center h-100"> 
                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-10 col-10">
                    <div class="d-flex flex-column flex-grow-1 justify-content-evenly align-items-center h-100">
                        <h2 class="text-white text-uppercase text-center">Controle de Gastos</h2>
                        <div class="col-6 text-center">
                            <img src="<?= SITE ?>images/graphics.svg" alt="" class="img-fluid">
                        </div>
                        <p class="fs-7 text-white">Anote suas receitas e despesas com facilidade.</p>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-10 col-10 sombra border rounded-5 px-4 border-4 flex-column d-flex h-100  text-white border-light bg-2 text-center mt-xxl-0 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-5 mt-5">
                    <form action="<?= SITE ?>validar_login.php" method="POST" class="d-flex flex-column flex-grow-1 justify-content-between">
                        <h1 class="py-4 text-center">Login</h1>
                        <div class="text-start">
                            <label for="">CPF:</label>
                            <input type="text" class="form-control mb-3 mt-1" required name="cpf" id="cpf">
                        </div>
                        <div class="text-start">
                            <label for="">Senha:</label>
                            <input type="password" class="form-control mb-3 mt-1" name="senha">
                        </div>
                        <button type="submit" class="btn btn-primary my-3">Entrar</button>
                        <div class="col-10 pb-3 text-start">
                            <div><a href="<?= SITE ?>controllers/recuperar_senha.php" class="link text-white text-decoration-none fs-7">Esqueci minha senha</a></div>
                            <div><a href="<?= SITE ?>modulos/cadastro.php" class="link text-white text-decoration-none fs-7">Cadastre-se</a></div>
                        </div>
                    </form>
                </div>
            </div>
    
        </div>
        <?php include('error_message.php') ?>
    </div>
    <?php
    session_destroy();
    include("rodape.php")
    ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00', {
                reverse: false
            });
        });
    </script>