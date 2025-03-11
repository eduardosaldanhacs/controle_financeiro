<?php 
include('../includes/connect.php');
include('../define.php');
$entradaInicial = $_POST['entrada'];
$totalEntrada = $_POST['entrada'];
function obterPrimeiroEUltimoDiaMesAtual() {
    // Primeiro dia do mês atual
    $firstday = new DateTime('first day of this month');
    $lastday = new DateTime('last day of this month');
    
    return [
        'primeiro_dia' => $firstday->format('Y-m-d'),
        'ultimo_dia' => $lastday->format('Y-m-d')
    ];
}

$resultado = obterPrimeiroEUltimoDiaMesAtual();

$primeiroDia = $resultado['primeiro_dia'];
$ultimoDia = $resultado['ultimo_dia'];


$buscar_despesas = "SELECT * FROM tb_lancamentos WHERE data_lancamentos BETWEEN '$primeiroDia' AND '$ultimoDia'";
$resultado = mysqli_query($conexao, $buscar_despesas);
while ($despesa = mysqli_fetch_array($resultado)) {
    $despesaAtual = number_format((float)$despesa['valor'], 2, '.', ',');
    $totalEntrada -= $despesaAtual;
}
$inserirEntrada = "UPDATE tb_usuarios SET entrada = '$entradaInicial'";
(mysqli_query($conexao, $inserirEntrada));
$inserirSaldo = "UPDATE tb_usuarios SET saldo = '$totalEntrada'";
if (mysqli_query($conexao, $inserirSaldo)) {
    header("Location:". SITE ."painel/listagens.php");
}else{
    echo 'Erro ao atualizar saldo!';
}




?>