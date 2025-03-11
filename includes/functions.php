<?php
    include('connect.php');
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

?>