<?php
$where = ''; // Inicializa o filtro

if (isset($_GET['nome']) && !empty($_GET['nome'])) {
    $nome = htmlspecialchars($_GET['nome']);
    $where .= " AND receita LIKE '%$nome%'";
}

if (isset($_GET['data_inicio']) && isset($_GET['data_fim']) && !empty($_GET['data_inicio']) && !empty($_GET['data_fim'])) {
    $data_inicio = htmlspecialchars($_GET['data_inicio']);
    $data_fim = htmlspecialchars($_GET['data_fim']);
    $where .= " AND data_cadastro BETWEEN '$data_inicio' AND '$data_fim'";
}

$buscar_receitas = "SELECT * FROM tb_tipos_receitas WHERE excluido IS NULL $where ORDER BY id DESC";
$resultado = mysqli_query($conn, $buscar_receitas);
?>
<div class="container pt-2">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end pb-3">
                <a href="<?= SITE ?>tipos_de_receitas" class="btn btn-success btn-add">Adicionar</a>
                <a href="<?= SITE ?>receitas" class="btn btn-primary ms-2">Voltar</a>
            </div>
        </div>
        <form action="<?= SITE ?>listar_tipos_de_receitas" method="GET" class="d-flex align-items-center text-white flex-xxl-row flex-xl-row flex-lg-row flex-md-row flex-sm-column flex-column">
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <label for="" class="form-label text-white">Busca: </label>
                <input type="text" name="nome" class="form-control mb-2" id="nome" placeholder="Busque pelo nome da receita" value="<?php echo isset($_GET['nome']) ? $_GET['nome'] : ''; ?>">
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ms-xxl-3 ms-xl-3 ms-lg-3 ms-md-3 ms-sm-0 ms-0">
                <label for="" class="form-label text-white">Data de Cadastro: </label>
                <i>(data inicio - fim)</i>
                <div class="input-group">
                    <input type="date" name="data_inicio" class="form-control mb-2" id="data-inicio" value="<?php echo isset($_GET['data_inicio']) ? $_GET['data_inicio'] : ''; ?>">
                    <input type="date" name="data_fim" class="form-control mb-2" id="data-fim" value="<?php echo isset($_GET['data_fim']) ? $_GET['data_fim'] : ''; ?>">
                </div>
            </div>
            <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-12 col-12 mt-xxl-4 mt-xl-4 mt-lg-4 mt-md-4 mt-sm-2 mt-2 text-white text-center mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0 mb-bm-2 mb-2
            ms-xxl-2 ms-xl-2 ms-lg-2 ms-md-2 ms-sm-2 ms-0">
                <button type="submit" class="btn btn-outline-light w-100">Buscar</button>
            </div>
        </form>
    </div>

    <ul class="row list-unstyled bg-light mt-2">
        <li class="col-12 text-white bg-2 py-3 text-center border-bottom border-dark">
            <div class="row justify-content-between fs-mobile">
                <div class="col-4">Receita</div>
                <div class="col-4">Data de Cadastro</div>
                <div class="col-3">Ações</div>
            </div>
        </li>
        <?php
        while ($receita = mysqli_fetch_array($resultado)) {
        ?>
            <li class="col-12 text-center">
                <div class="row justify-content-between align-items-center mb-0 py-3 bg-default border-bottom border-dark fs-mobile">
                    <div class="col-4">
                        <?= $receita['receita'] ?>
                    </div>
                    <div class="col-4">
                        <?= $receita['data_cadastro'] ? formataData($receita['data_cadastro']) : '' ?>
                    </div>
                    <div class="col-3">
                        <a href="<?= SITE ?>tipos_de_receitas&cod=<?= $receita['id'] ?>" class="fs-4 text-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="<?= SITE ?>controllers/excluir_tipo_de_receita.php?id=<?= $receita['id'] ?>" class="fs-4 ms-3 text-danger"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>