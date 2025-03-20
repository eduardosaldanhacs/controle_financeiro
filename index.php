<?php
include('modulos/topo.php');
if (verificaLogin()) {
    $pag = isset($_GET['a']) ? $_GET['a'] : 'home';
    //echo $pag;
    include('views/header.php');
    switch ($pag) {                
        case 'cadastro':
            include('views/cadastro.php');
            break;    
        case 'cadastro_despesas';
            include('views/cadastro_despesas.php');
            break;
        case 'despesas':
            include('views/despesas.php');
            break;
        case 'cadastro_lancamentos':
            include('views/cadastro_lancamentos.php');
            break;
        case "cadastro_despesas&cod='{$_GET['b']}'":
            include("views/cadastro_despesas.php?id={$_GET['b']}'");
            break;
        case 'lancamentos':
            include('views/lancamentos.php');
            break;
        case 'editar':
            include('views/editar.php');
            break;
        default:
            include('views/home.php');
            break;
    }
} else {
    include('modulos/login.php');
}

include('modulos/rodape.php');
?>
