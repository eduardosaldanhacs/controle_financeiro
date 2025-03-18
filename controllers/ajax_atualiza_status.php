<?php


include('../includes/connect.php');
include('../define.php');
$saldoFinal = 0;

function somarValoresReais($valor1, $valor2) {
    // Converte o formato brasileiro para formato numérico padrão (ponto como separador decimal)
    $numero1 = floatval(str_replace(',', '.', str_replace('.', '', $valor1)));
    $numero2 = floatval(str_replace(',', '.', str_replace('.', '', $valor2)));
    
    // Realiza a soma
    $soma = $numero1 + $numero2;
    
    // Retorna o resultado formatado no padrão brasileiro
    return number_format($soma, 2, '.', '');
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

function converterFormatoEntrada($valor) {
    // Remove o ponto usado como separador de milhar e substitui a vírgula pelo ponto
    $valor = str_replace('.', '', $valor);
    $valor = str_replace(',', '.', $valor);
    return $valor;
}

$id = $_POST['id'];
$buscar_lancamentos = "SELECT * from tb_lancamentos where id=$id";
$resultado = mysqli_query($conn, $buscar_lancamentos);
$dados = mysqli_fetch_array($resultado); 
$valorFatura = $dados['valor'];

$buscarSaldo = "SELECT saldo FROM tb_usuarios";
$resultado2 = mysqli_query($conn, $buscarSaldo);
$dados2 = mysqli_fetch_array($resultado2);
$saldo = $dados2['saldo'];
 


$valorFatura = converterFormatoEntrada($valorFatura);
if ($dados['pago'] == 'S') {
    $pago = 'N';
    $saldoFinal = ($saldo + $valorFatura);
    $inserirSaldo = "UPDATE tb_usuarios SET saldo = '$saldoFinal'";
    mysqli_query($conn, $inserirSaldo);
} else {
    $pago = 'S';
    $saldoFinal = ($saldo - $valorFatura);
    $inserirSaldo = "UPDATE tb_usuarios SET saldo = '$saldoFinal'";
    mysqli_query($conn, $inserirSaldo);
}
$sql = "UPDATE tb_lancamentos SET pago = '$pago' WHERE id = '$id'";
$query = mysqli_query($conn, $sql);

echo json_encode(['success' => true, 'inserirSaldo' => $inserirSaldo, 'pago' => $pago, 'saldoInicial' => $saldo, 'valorFatura' => $dados['valor']]); 

 
