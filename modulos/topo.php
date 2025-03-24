<?php
include('includes/connect.php');
include('includes/define.php');
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!isset($_SESSION['id'])) {
    header("Location:" . SITE . "modulos/login.php");
}
$saldo = 0.00;

$busca_nome = "SELECT * FROM tb_usuarios WHERE id = 2";
$resultado = mysqli_query($conn, $busca_nome);
$dados = mysqli_fetch_array($resultado);

$saldo = isset($dados['saldo']) ? $dados['saldo'] : 0.00;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
    include("includes/links.php");
    include("includes/functions.php");
    ?>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body class="bg-1">


