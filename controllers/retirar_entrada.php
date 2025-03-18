<?php 
include('../includes/connect.php');
include('../define.php');

$saldo = 0;

$entradaInicial = $_POST['entrada'];
$buscaSaldo = "SELECT saldo FROM tb_usuarios";
$resultado = mysqli_query($conn, $buscaSaldo);
$dados = mysqli_fetch_array($resultado);

function somarValoresReais($valor1, $valor2) {
    // Converte o formato brasileiro para formato numérico padrão (ponto como separador decimal)
    $numero1 = floatval(str_replace(',', '.', str_replace('.', '', $valor1)));
    $numero2 = floatval(str_replace(',', '.', str_replace('.', '', $valor2)));
    
    $soma = $numero1 - $numero2;
    
    // Retorna o resultado formatado no padrão brasileiro
    return number_format($soma, 2, '.', '');
}

function converterFormatoEntrada($valor) {
    // Remove o ponto usado como separador de milhar e substitui a vírgula pelo ponto
    $valor = str_replace('.', '', $valor);
    $valor = str_replace(',', '.', $valor);
    return $valor;
}
$entradaInicial = converterFormatoEntrada($entradaInicial);
$saldo = $dados['saldo'] - $entradaInicial;

$inserirSaldo = "UPDATE tb_usuarios SET saldo = '$saldo'";
if (mysqli_query($conn, $inserirSaldo)) {
 header("Location:". SITE ."listagens");
    }else{
        echo 'ERRO NO CADASTRO!!!';
    }



?>