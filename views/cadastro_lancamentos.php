<?php
    if($_GET['cod']) {
        $id = $_GET['cod'];
        echo $buscar_lancamentos = "SELECT * FROM tb_lancamentos WHERE id = '$id'";
        $resultado = mysqli_query($conn, $buscar_lancamentos);
        $lancamento = mysqli_fetch_array($resultado);
        $titulo = 'Atualizar';
        $action = "atualizar_lancamentos.php";
    } else {
        $titulo = 'Cadastrar';
        $action = "cadastrar_lancamentos.php";
    }
?>

<div class="container">
    <div class="row align-items-center h-100 justify-content-center py-5">
        <div class="col-6 border-2 rounded-5 px-4 mb-5 border-3 text-white bg-light shadow-lg me-5">
            <form action="<?= SITE ?>controllers/<?= $action ?>" method="POST">
                <h3 class="my-3 text-primary text-center"> <?= $titulo ?> Lançamentos</h3>
                <label for="" class="form-label pt-3 text-dark">Despesas</label>
                <select class="form-select mb-4" name="despesa" id="">
                    <option value="">---</option>
                    <?php
                    $sql = "SELECT * FROM tb_despesas WHERE excluido IS NULL ORDER BY id DESC";
                    $query = mysqli_query($conn, $sql);
                    while ($despesa = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $despesa['despesa']; ?>" <?= isset($lancamento['despesa']) && $lancamento['despesa'] == $despesa['despesa'] ? 'selected' : ''; ?>><?= $despesa['despesa']; ?></option>
                    <?php } ?>
                </select>

                <label for="Valor" class="form-label text-dark">Valor:</label>
                <input type="text" class="form-control mb-4" required name="valor" id="valor" value="<?= isset($lancamento['valor']) ? $lancamento['valor'] : ''; ?>">

                <label for="Data" class="form-label text-dark">Data:</label>
                <input type="date" class="form-control mb-4" required name="data" value="<?= isset($lancamento['data']) ? $lancamento['data'] : date('Y-m-d'); ?>">

                <label for="Pago" class="form-label text-dark">Pago:</label>
                <select name="pago" id="" class="form-select mb-2">
                    <option value="N" <?= isset($lancamento['pago']) && $lancamento['pago'] == 'N' ? 'selected' : ''; ?>>Nao</option>
                    <option value="S" <?= isset($lancamento['pago']) && $lancamento['pago'] == 'S' ? 'selected' : ''; ?>>Sim</option>
                </select>
                <div class="text-center pb-3">
                    <input type="hidden" name="id" value="<?= isset($lancamento['id']) ? $lancamento['id'] : ''; ?>">
                    <button type="submit" class="btn btn-success btn-lg"><?= $titulo ?></button>
                </div>
            </form>
        </div>
    </div>
</div>