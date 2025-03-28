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

    function somarValoresReais($valor1, $valor2) {
        // Converte o formato brasileiro para formato numérico padrão (ponto como separador decimal)
        $numero1 = floatval(str_replace(',', '.', str_replace('.', '', $valor1)));
        $numero2 = floatval(str_replace(',', '.', str_replace('.', '', $valor2)));
        
        $soma = $numero1 + $numero2;
        
        // Retorna o resultado formatado no padrão brasileiro
        return number_format($soma, 2, '.', '');
    }
    
    function converterFormatoEntrada($valor) {
        // Remove o ponto usado como separador de milhar e substitui a vírgula pelo ponto
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
        return $valor;
    }

    function obterPrimeiroEUltimoDiaMesAtual() {
        // Primeiro dia do mês atual
        $firstday = new DateTime('first day of this month');
        $lastday = new DateTime('last day of this month');
        
        return [
            'primeiro_dia' => $firstday->format('Y-m-d'),
            'ultimo_dia' => $lastday->format('Y-m-d')
        ];
    }

   
    
    function subtraiValoresReais($valor1, $valor2) {
        // Converte o formato brasileiro para formato numérico padrão (ponto como separador decimal)
        $numero1 = floatval(str_replace(',', '.', str_replace('.', '', $valor1)));
        $numero2 = floatval(str_replace(',', '.', str_replace('.', '', $valor2)));
        
        // Realiza a soma
        $soma = $numero1 - $numero2;
        
        // Retorna o resultado formatado no padrão brasileiro
        return number_format($soma, 2, '.', '');
    }
    
   


    function alertMessage($message, $type) {
        $_SESSION['message']['text'] = $message;
        $_SESSION['message']['type'] = $type;
    }

    function formataData($date) {
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
        return $date;
    }

    function descobreUsuario($id) {
        $sql = "SELECT * FROM tb_usuarios WHERE id = $id";
        $query = mysqli_query($_SESSION['connection'], $sql);
        return mysqli_fetch_array($query);
    }

    function atualizaSaldo($saldo, $id_usuario) {
        $atualizar_saldo = "UPDATE tb_usuarios SET saldo = '$saldo' WHERE id = '$id_usuario'";
        $query = mysqli_query($_SESSION['connection'], $atualizar_saldo);
        return $query;
    }

    function formatarValor($valor) {
        return number_format($valor, 2, ',', '');
    }

?>