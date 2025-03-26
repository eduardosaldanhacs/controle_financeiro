<?php
$where = ''; // Inicializa o filtro
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
    $where .= " AND data_cadastro BETWEEN '$data_inicio' AND '$data_fim'";
}

$buscar_despesas = "SELECT * FROM tb_despesas WHERE excluido IS NULL $where ORDER BY data_cadastro DESC";
$resultado = mysqli_query($conn, $buscar_despesas);
?>
<div class="container pt-2">
    <div class="row">
        <div class="col-12">
            <!-- <div class="d-flex justify-content-end pb-3">
                <a href="<?= SITE ?>cadastro_despesas" class="btn btn-success btn-add">Adicionar</a>
            </div> -->
            <div class="d-flex justify-content-end pb-3">
                <div class="col-2 pe-2"><a href="<?= SITE ?>cadastro_despesas" class="btn btn-success btn-add w-100">Nova Despesa</a></div>
                <div class="col-2 pe-2"><a href="<?= SITE ?>tipos_de_despesas" class="btn btn-success btn-add w-100">Nova Categoria</a></div>
                <div class="col-2"><a href="<?= SITE ?>listar_tipos_de_despesas" class="btn btn-success btn-add w-100">Listar Categorias</a></div>
            </div>


        </div>
        <form action="<?= SITE ?>despesas" method="GET" class="d-flex justify-content-between align-items-center text-white">
            <div class="col-4">
                <label for="" class="form-label text-white">Busca: </label>
                <input type="text" name="nome" class="form-control mb-2" id="nome" placeholder="Busque pelo nome da despesa" value="<?php echo isset($_GET['nome']) ? $_GET['nome'] : ''; ?>">
            </div>
            <div class="col-2">
                <label for="" class="form-label text-white">Tipos: </label>
                <select name="pago" id="" class="form-select mb-2">
                    <option value="" selected>Escolha...</option>
                    <option value="N" <?= isset($_GET['pago']) && $_GET['pago'] == 'N' ? 'selected' : ''; ?>>Não Pago</option>
                    <option value="S" <?= isset($_GET['pago']) && $_GET['pago'] == 'S' ? 'selected' : ''; ?>>Pago</option>
                    <option value="" <?= isset($_GET['pago']) && $_GET['pago'] == 'A' ? 'selected' : ''; ?>>Atrasados</option>
                </select>
            </div>
            <div class="col-4">
                <label for="" class="form-label text-white">Data de Vencimento: </label>
                <i>(data inicio - fim)</i>
                <div class="input-group">
                    <input type="date" name="data_inicio" class="form-control mb-2" id="data-inicio" value="<?php echo isset($_GET['data_inicio']) ? $_GET['data_inicio'] : ''; ?>">
                    <input type="date" name="data_fim" class="form-control mb-2" id="data-fim" value="<?php echo isset($_GET['data_fim']) ? $_GET['data_fim'] : ''; ?>">
                </div>
            </div>
            <div class="col-1 mt-4 text-white">
                <button type="submit" class="btn btn-outline-light">Buscar</button>
            </div>
        </form>
    </div>

    <ul class="row list-unstyled bg-light">
        <li class="col-12 text-white bg-2 py-3 text-center border-bottom border-dark">
            <div class="d-flex justify-content-between">
                <div class="col-4">Despesa</div>
                <div class="col-2">Valor</div>
                <div class="col-2">Data de Lançamento</div>
                <div class="col-2">Pago</div>
                <div class="col-2">Ações</div>
            </div>
        </li>
        <?php
        while ($despesa = mysqli_fetch_array($resultado)) {
            $dataAtual = new DateTime();
            $dataLancamento = new DateTime($despesa['data_cadastro']);
            $diferencaDias = $dataLancamento->diff($dataAtual)->days;

            $pagamento = $despesa['pago'];

            if ($dataLancamento < $dataAtual && ($pagamento == 'N' || $pagamento == null)) {
                if ($diferencaDias <= 15) {
                    $classeAtraso = 'bg-default'; // Não atrasado
                } elseif ($diferencaDias > 15 && $diferencaDias <= 30) {
                    $classeAtraso = 'bg-yellow'; // Amarelo
                } else {
                    $classeAtraso = 'bg-red'; // Vermelho
                }
            } else {
                $classeAtraso = 'bg-default'; // Não atrasado
            }
            if ($despesa['pago'] == strtoupper('S')) {
                $checkbox = 'checked';
                $classeAtraso = 'bg-green';
            } else {
                //$classeAtraso = 'bg-default';
                $checkbox = '';
            }
        ?>
            <li class="col-12 text-center">
                <div class="row justify-content-between align-items-center mb-0 py-3 border-bottom border-dark <?= $classeAtraso ?> <?php if(isset($pago)) { echo $pago; } ?>">
                    <div class="col-4">
                        <?php echo $despesa['despesa'] ?>
                    </div>
    
                    <div id="valor-editavel" class="col-2 valor-editavel" data-id="<?= $despesa['id'] ?>">
                        <?= htmlspecialchars(($despesa['valor'])) ?>
                    </div>
                    <div class="col-2">
                        <?php echo converterYMDparaDMY($despesa['data_cadastro']) ?>
                    </div>
                    <div class="col-2">
                        <input type="checkbox" class="checkbox-grande checkbox-pago" data-user=<?= $_SESSION['id'] ?> data-id="<?= $despesa['id'] ?>" <?= $checkbox ?> onclick="refreshWithDelay()">
                    </div>
                    <div class="col-2">
                        <a href="<?= SITE ?>cadastro_despesas&cod=<?= $despesa['id'] ?>" class="fs-4 text-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="<?= SITE ?>controllers/excluir_despesa.php?id=<?= $despesa['id'] ?>" class="fs-4 ms-3 text-danger"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>
