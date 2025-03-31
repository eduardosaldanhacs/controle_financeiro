<?php
    if($_GET['cod']) {
        $id = $_GET['cod'];
        $buscar_receita = "SELECT * FROM tb_tipos_receitas WHERE id = '$id'";
        $resultado = mysqli_query($conn, $buscar_receita);
        $receita = mysqli_fetch_array($resultado);
        $titulo = 'Atualizar';
        $action = "atualizar_tipo_de_receita.php";
    } else {
        $titulo = 'Cadastrar';
        $action = "cadastrar_tipo_de_receita.php";
    }
?>

<div class="container">
    <div class="row align-items-center h-100 justify-content-center py-5">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 border-2 rounded-5 px-4 mb-5 border-3 text-white bg-light shadow-lg py-5">
            <form action="<?= SITE ?>controllers/<?= $action ?>" method="POST">
                <h4 class="my-3 text-primary text-center"> <?= $titulo ?> Tipo de Receita</h4>
                <label for="" class="form-label pt-3 text-dark">Nome:</label>
                <input type="text" class="form-control mb-4 border" required name="receita" value="<?= isset($receita['receita']) ? $receita['receita'] : ''; ?>">
                <div class="text-center pb-3">
                    <?php if($_GET['cod']) { ?>
                        <input type="hidden" name="id" value="<?= $receita['id']; ?>">
                    <?php } ?>
                    <button type="submit" class="btn btn-success btn-lg"><?= $titulo ?></button>
                </div>
            </form>
        </div>
        <div class="col-7 text-center">
            <a href="<?= SITE ?>receitas" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</div>

