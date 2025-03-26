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

$buscar_receitas = "SELECT * FROM tb_receitas WHERE excluido IS NULL $where ORDER BY id DESC";
$resultado = mysqli_query($conn, $buscar_receitas);
?>
<div class="container pt-2">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end pb-3">
                <div class="col-2 pe-2"><a href="<?= SITE ?>cadastro_receitas" class="btn btn-success btn-add w-100">Nova Receita</a></div>
                <div class="col-2 pe-2"><a href="<?= SITE ?>tipos_de_receitas" class="btn btn-success btn-add w-100">Nova Categoria</a></div>
                <div class="col-2"><a href="<?= SITE ?>listar_tipos_de_receitas" class="btn btn-success btn-add w-100">Listar Categorias</a></div>
            </div>
        </div>
        <form action="<?= SITE ?>receitas" method="GET" class="d-flex align-items-center text-white">
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <label for="" class="form-label text-white">Busca: </label>
                <input type="text" name="nome" class="form-control mb-2" id="nome" placeholder="Busque pelo nome da receita" value="<?php echo isset($_GET['nome']) ? $_GET['nome'] : ''; ?>">
            </div>
            <div class="col-4 ms-3">
                <label for="" class="form-label text-white">Data de Recebimento: </label>
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
                <div class="col-5">Receitas</div>
                <div class="col-2">Valor</div>
                <div class="col-2">Data de Cadastro</div>
                <div class="col-2">Ações</div>
            </div>
        </li>
        <?php
        while ($receita = mysqli_fetch_array($resultado)) {
        ?>
            <li class="col-12 text-center">
                <div class="row justify-content-between align-items-center mb-0 py-3 bg-green border-bottom border-dark">
                    <div class="col-5">
                        <?= $receita['receita'] ?>
                    </div>
                    <div class="col-2">
                        <?= $receita['valor'] ?>
                    </div>
                    <div class="col-2">
                        <?= $receita['data_cadastro'] ? formataData($receita['data_cadastro']) : '' ?>
                    </div>
                    <div class="col-2">
                        <a href="<?= SITE ?>cadastro_receitas&cod=<?= $receita['id'] ?>" class="fs-4 text-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="<?= SITE ?>controllers/excluir_receita.php?id=<?= $receita['id'] ?>" class="fs-4 ms-3 text-danger"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>