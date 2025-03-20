
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
            transition: opacity 0.5s ease-in-out; /* Suaviza a transição */
            opacity: 1;
        }
    </style>
<?php 
    unset($_SESSION['message']); // Remover mensagem após exibição
endif; ?>
