<?php
$where = ''; // Inicializa o filtro

if (isset($_GET['nome']) && !empty($_GET['nome'])) {
    $nome = htmlspecialchars($_GET['nome']); 
    $where .= " AND despesa LIKE '%$nome%'";
}

if (isset($_GET['data_inicio']) && isset($_GET['data_fim']) && !empty($_GET['data_inicio']) && !empty($_GET['data_fim'])) {
    $data_inicio = htmlspecialchars($_GET['data_inicio']); 
    $data_fim = htmlspecialchars($_GET['data_fim']); 
    $where .= " AND data_cadastro BETWEEN '$data_inicio' AND '$data_fim'";
}

echo $buscar_despesas = "SELECT * FROM tb_tipos_despesas WHERE excluido IS NULL $where ORDER BY id DESC";
$resultado = mysqli_query($conn, $buscar_despesas);
?>
<div class="container pt-2">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end pb-3">
                <a href="<?= SITE ?>cadastro_despesas" class="btn btn-success btn-add">Adicionar</a>
            </div>
        </div>
        <form action="<?= SITE ?>despesas" method="GET" class="d-flex align-items-center text-white">
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <label for="" class="form-label text-white">Busca: </label>
                <input type="text" name="nome" class="form-control mb-2" id="nome" placeholder="Busque pelo nome da despesa" value="<?php echo isset($_GET['nome']) ? $_GET['nome'] : ''; ?>">
            </div>
            <div class="col-4 ms-3">
                <label for="" class="form-label text-white">Data de Cadastro: </label>
                <i>(data inicio - fim)</i>
                <div class="input-group">
                    <input type="date" name="data_inicio" class="form-control mb-2" id="data-inicio" value="<?php echo isset($_GET['data_inicio']) ? $_GET['data_inicio'] : ''; ?>">
                    <input type="date" name="data_fim" class="form-control mb-2" id="data-fim" value="<?php echo isset($_GET['data_fim']) ? $_GET['data_fim'] : ''; ?>">
                </div>
            </div>
            <div class="col-1 mt-4 text-white ms-3">
                <button type="submit" class="btn btn-outline-light">Buscar</button>
            </div>
        </form>
    </div>

    <ul class="row list-unstyled bg-light">
        <li class="col-12 text-white bg-2 py-3 text-center border-bottom border-dark">
            <div class="d-flex justify-content-between">
                <div class="col-5">Despesa</div>
                <div class="col-2">Data de Cadastro</div>
                <div class="col-2">Ações</div>
            </div>
        </li>
        <?php
        while ($despesa = mysqli_fetch_array($resultado)) {
        ?>
            <li class="col-12 text-center">
                <div class="row justify-content-between align-items-center mb-0 py-3 bg-default border-bottom border-dark">
                    <div class="col-5">
                        <?= $despesa['despesa'] ?>
                    </div>
                    <div class="col-2">
                        <?= $despesa['data_cadastro'] ? formataData($despesa['data_cadastro']) : '' ?>
                    </div>
                    <div class="col-2">
                        <a href="<?= SITE ?>cadastro_despesas&cod=<?= $despesa['id'] ?>" class="fs-4 text-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="<?= SITE ?>controllers/excluir_tipo_de_despesa.php?id=<?= $despesa['id'] ?>" class="fs-4 ms-3 text-danger"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>