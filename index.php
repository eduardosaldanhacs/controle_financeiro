<?php
include('modulos/topo.php');
if (verificaLogin()) {
    include('views/header.php');
    $pag = isset($_GET['pag']) ? $_GET['pag'] : 'home';

    switch ($pag) {
        case 'despesas':
            include('views/despesas.php');
            break;
        case 'lancamentos':
            include('views/lancamentos.php');
            break;
        case 'listagens':
            include('views/listagens.php');
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

?>

</body>
<?php
include('modulos/rodape.php');
?>