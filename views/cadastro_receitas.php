<?php
    if($_GET['cod']) {
        $id = $_GET['cod'];
        $buscar_receitas = "SELECT * FROM tb_receitas WHERE id = '$id'";
        $resultado = mysqli_query($conn, $buscar_receitas);
        $receita = mysqli_fetch_array($resultado);
        $titulo = 'Atualizar';
        $action = "atualizar_receita.php";
    } else {
        $titulo = 'Cadastrar';
        $action = "cadastrar_receita.php";
    }
?>

<div class="container">
    <div class="row align-items-center h-100 justify-content-center py-5">
        <div class="col-xxl-6 col-xl-6 col-lg-6  col-md-6 col-sm-10 col-10  border-2 rounded-5 px-4 mb-5 border-3 text-white bg-light shadow-lg">
            <form action="<?= SITE ?>controllers/<?= $action ?>" method="POST">
                <h3 class="my-3 text-primary text-center"> <?= $titulo ?> Receitas</h3>
                <label for="" class="form-label pt-3 text-dark">Tipos de Receitas</label>
                <select class="form-select mb-4" name="receita" id="">
                    <option value="">---</option>
                    <?php
                    $sql = "SELECT * FROM tb_tipos_receitas WHERE excluido IS NULL ORDER BY id DESC";
                    $query = mysqli_query($conn, $sql);
                    while ($tipos_receitas = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $tipos_receitas['receita']; ?>" <?= isset($tipos_receitas['receita']) && $tipos_receitas['receita'] == $receita['receita'] ? 'selected' : ''; ?>><?= $tipos_receitas['receita']; ?></option>
                    <?php } ?>
                </select>

                <label for="Valor" class="form-label text-dark">Valor:</label>
                <input type="text" class="form-control mb-4" required name="valor" id="valor" value="<?= isset($receita['valor']) ? $receita['valor'] : ''; ?>">

                <label for="Data" class="form-label text-dark">Data:</label>
                <input type="date" class="form-control mb-4" required name="data" value="<?= isset($receita['data']) ? $receita['data'] : date('Y-m-d'); ?>">

                <!-- <label for="Pago" class="form-label text-dark">Pago:</label>
                <select name="pago" id="" class="form-select mb-2">
                    <option value="N" <?= isset($receita['pago']) && $receita['pago'] == 'N' ? 'selected' : ''; ?>>Nao</option>
                    <option value="S" <?= isset($receita['pago']) && $receita['pago'] == 'S' ? 'selected' : ''; ?>>Sim</option>
                </select> -->
                <div class="text-center pb-3">
                    <input type="hidden" name="id" value="<?= isset($receita['id']) ? $receita['id'] : ''; ?>">
                    <button type="submit" class="btn btn-success btn-lg"><?= $titulo ?></button>
                </div>
            </form>
        </div>
    </div>
</div>