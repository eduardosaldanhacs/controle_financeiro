<?php
ob_start();
include('../includes/essenciais.php');
$saldoFinal = 0;



$id = $_POST['id'];

$buscar_lancamentos = "SELECT * from tb_despesas where id=$id";
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
$sql = "UPDATE tb_despesas SET pago = '$pago' WHERE id = '$id'";
$query = mysqli_query($conn, $sql);

// echo json_encode([
//     'success' => true, 
//     'inserirSaldo' => $inserirSaldo, 
//     'pago' => $pago, 
//     'saldoInicial' => $saldo, 
//     'valorFatura' => $dados['valor']]); 


ob_end_clean(); // Limpa qualquer saída anterior
header('Content-Type: application/json; charset=UTF-8'); // Define que a resposta será JSON

echo json_encode([
    'success' => true,
    'inserirSaldo' => $inserirSaldo,
    'pago' => $pago,
    'saldoInicial' => $saldo,
    'valorFatura' => $dados['valor']
]);

exit; // Garante que nada mais será enviado


