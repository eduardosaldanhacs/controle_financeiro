<?php
include('../includes/connect.php');
include('../define.php');
include('../includes/functions.php');

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css">

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
<?php print_r($_SESSION);

?>
<body class="bg-1" onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">
    <div class="container">
        <?php if ((isset($_SESSION['message'])) != NULL) :
            echo 'teste';
            $message_text = $_SESSION['message']['text'];
            $message_type = $_SESSION['message']['type'];
        ?>
            <div id="alert-message" class="position-absolute w-100 row justify-content-center align-items-center mt-2">
                <div class="col-6 bg-<?= $message_type ?> text-center rounded d-flex align-items-center justify-content-center alert-box">
                    <p class="text-white m-0 py-2"><?= $message_text ?></p>
                </div>
            </div>

            <script>
                setTimeout(() => {
                    const messageBox = document.getElementById('alert-message');
                    if (messageBox) {
                        messageBox.style.opacity = "0";
                        setTimeout(() => {
                            messageBox.remove();
                        }, 500); // Tempo da transição para sumir completamente
                    }
                }, 3000); // Tempo antes de começar a sumir (3 segundos)
            </script>

            <style>
                .alert-box {
                    transition: opacity 0.5s ease-in-out;
                    /* Suaviza a transição */
                    opacity: 1;
                }
            </style>
        <?php
            unset($_SESSION['message']); // Remover mensagem após exibição
            $_SESSION['message'] = NULL;
        endif; ?>

        <div class="text-start py-5">
            <div class="row align-items-stretch d-flex justify-content-center">
                <div class="col-md-5 sombra border rounded-5 px-4 border-4 flex-column d-flex h-100  text-white border-light">
                    <form action="<?= SITE ?>validar_login.php" method="POST" class="d-flex flex-column flex-grow-1 justify-content-between">
                        <h1 class="py-4 text-center">Login</h1>
                        <label for="">CPF</label>
                        <input type="text" class="form-control mb-3" required name="cpf" id="cpf">
                        <label for="">Senha</label>
                        <input type="password" class="form-control mb-3" name="senha">
                        <button type="submit" class="btn btn-primary my-3">Entrar</button>
                        <div class="col-5 pb-3">
                            <a href="<?= SITE ?>controllers/recuperar_senha.php" class="text-white text-decoration-none fs-7">Esqueci minha senha</a>
                            <a href="<?= SITE ?>modulos/cadastro.php" class="text-white text-decoration-none fs-7">Cadastre-se</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("rodape.php")
    ?>