<?php
    if($_GET['cod']) {
        $id = $_GET['cod'];
        echo $buscar_despesa = "SELECT * FROM tb_despesas WHERE id = '$id'";
        $resultado = mysqli_query($conn, $buscar_despesa);
        $despesa = mysqli_fetch_array($resultado);
        $titulo = 'Atualizar';
        $action = "atualizar_despesa.php";
    } else {
        $titulo = 'Cadastrar';
        $action = "cadastrar_despesa.php";
    }
?>

<div class="container">
    <div class="row align-items-center h-100 justify-content-center py-5">
        <div class="col-6 border-2 rounded-5 px-4 mb-5 border-3 text-white bg-light shadow-lg py-5 me-5">
            <form action="<?= SITE ?>controllers/<?= $action ?>" method="POST">
                <h3 class="my-3 text-primary text-center"> <?= $titulo ?> Despesas</h3>
                <label for="" class="form-label pt-3 text-dark">Nome:</label>
                <input type="text" class="form-control mb-4 border" required name="despesa" value="<?= isset($despesa['despesa']) ? $despesa['despesa'] : ''; ?>">
                <div class="text-center pb-3">
                    <?php if($_GET['cod']) { ?>
                        <input type="hidden" name="id" value="<?= $despesa['id']; ?>">
                    <?php } ?>
                    <button type="submit" class="btn btn-success btn-lg">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

