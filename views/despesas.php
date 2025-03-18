<?php
$where = ''; // Inicializa o filtro

if (isset($_GET['nome']) && !empty($_GET['nome'])) {
    $nome = htmlspecialchars($_GET['nome']); 
    $where .= " AND despesa LIKE '%$nome%'";
}

if (isset($_GET['pago']) && !empty($_GET['pago'])) {
    $pago = htmlspecialchars($_GET['pago']); 
    $where .= " AND pago = '$pago'";
}

if (isset($_GET['data_inicio']) && isset($_GET['data_fim']) && !empty($_GET['data_inicio']) && !empty($_GET['data_fim'])) {
    $data_inicio = htmlspecialchars($_GET['data_inicio']); 
    $data_fim = htmlspecialchars($_GET['data_fim']); 
    $where .= " AND data_lancamentos BETWEEN '$data_inicio' AND '$data_fim'";
}

$buscar_despesas = "SELECT * FROM tb_despesas WHERE excluido IS NULL $where ORDER BY id DESC";
$resultado = mysqli_query($conn, $buscar_despesas);
?>
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end pb-3">
                <a href="<?= SITE ?>cadastro_despesas" class="btn btn-success btn-add">Adicionar</a>
            </div>
        </div>
        <form action="listagens.php" method="GET" class="d-flex justify-content-between align-items-center text-white">
            <div class="col-4">
                <label for="" class="form-label text-white">Busca: </label>
                <input type="text" name="nome" class="form-control mb-2" id="nome" placeholder="Busque pelo nome da despesa">
            </div>
            <div class="col-2">
                <label for="" class="form-label text-white">Tipos: </label>
                <select name="pago" id="" class="form-select mb-2">
                    <option value="">Escolha...</option>
                    <option value="N">Não Pago</option>
                    <option value="S">Pago</option>
                    <option value="">Atrasados</option>
                </select>
            </div>
            <div class="col-4">
                <label for="" class="form-label text-white">Data de Vencimento: </label>
                <i>(data inicio - fim)</i>
                <div class="input-group">
                    <input type="date" name="data_inicio" class="form-control mb-2" id="data-inicio">
                    <input type="date" name="data_fim" class="form-control mb-2" id="data-fim">
                </div>
            </div>
            <div class="col-1 mt-4 text-white">
                <button type="submit" class="btn btn-outline-light">Buscar</button>
            </div>
        </form>
    </div>

    <ul class="row list-unstyled bg-light">
        <li class="col-12 text-white bg-primary py-3 text-center">
            <div class="d-flex justify-content-between">
                <div class="col-3">Despesa</div>
                <div class="col-2">Data de Cadastro</div>
                <div class="col-3">Ações</div>
            </div>
        </li>
        <?php
        while ($despesa = mysqli_fetch_array($resultado)) {
        ?>
            <li class="col-12 text-center">
                <div class="row justify-content-between align-items-center mb-0 py-3 border alert <?= $classeAtraso ?> <? if(isset($pago)) { echo $pago; } ?>">
                    <div class="col-3">
                        <?php echo $despesa['despesa'] ?>
                    </div>
                    <div class="col-2">
                        <?= $despesa['data_cadastro'] ?>
                    </div>
                    <div class="col-3">
                        <a href="<?= SITE ?>cadastro_despesas&cod=<?= $despesa['id'] ?>"><button type="submit" class="btn btn-secondary btn-sm bg-success">Editar</button></a>
                        <a href="<?= SITE ?>controllers/excluir_despesa.php?id=<?= $despesa['id'] ?>"><button type="submit" class="btn btn-secondary btn-sm bg-danger">Excluir</button></a>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>