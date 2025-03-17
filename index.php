<?php
include('modulos/topo.php');
if (verificaLogin()) {
    $pag = isset($_GET['a']) ? $_GET['a'] : 'home';
    echo $pag;
    switch ($pag) {                
        case 'cadastro':
            include('views/cadastro.php');
            break;

            
        include('views/header.php');
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