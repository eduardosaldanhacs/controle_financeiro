<?php
include('modulos/topo.php');
if (verificaLogin()) {
    $pag = isset($_GET['a']) ? $_GET['a'] : 'home';
    include('views/header.php');
    switch ($pag) {
        case 'cadastro':
            include('views/cadastro.php');
            break;
        case 'receitas':
            include('views/receitas.php');
            break;
        case 'cadastro_receitas':
            include('views/cadastro_receitas.php');
            break;
        case "cadastro_receitas&cod='{$_GET['b']}'":
            include("views/cadastro_receitas.php?id={$_GET['b']}'");
            break;
        case 'tipos_de_receitas':
            include('views/tipos_de_receitas.php');
            break;
        case 'listar_tipos_de_receitas':
            include('views/listar_tipos_de_receitas.php');
            break;
        case 'despesas':
            include('views/despesas.php');
            break;
        case 'cadastro_despesas';
            include('views/cadastro_despesas.php');
            break;
        case "cadastro_despesas&cod='{$_GET['b']}'":
            include("views/cadastro_despesas.php?id={$_GET['b']}'");
            break;
        case 'tipos_de_despesas';
            include('views/tipos_de_despesas.php');
            break;
        case 'listar_tipos_de_despesas';
            include('views/listar_tipos_de_despesas.php');
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="<?= SITE ?>includes/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
