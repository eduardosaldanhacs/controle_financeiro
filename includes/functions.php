<?php
    session_start();
    function verificaLogin() {
        $_SESSION['id'] = isset($_SESSION['id']) ? $_SESSION['id'] : null;
        return isset($_SESSION['id']);
    }


    function formatarValorReais3($valor)
    {
        // Garante que o valor seja numérico
        $valor = floatval($valor);

        // Formata o valor para o padrão brasileiro (R$ 1.234,56)
        return number_format($valor, 2, ',', '.');
    }
    function converterYMDparaDMY($data_ymd)
    {
        // Cria um objeto DateTime a partir da string de data no formato YMD
        $data = new DateTime($data_ymd);

        // Retorna a data formatada no formato DMY (d/m/Y)
        return $data->format('d/m/Y');
    }

    function alertMessage($message, $type) {
        $_SESSION['message']['text'] = $message;
        $_SESSION['message']['type'] = $type;
    }

    function formataData($date) {
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
        return $date;
    }

?>