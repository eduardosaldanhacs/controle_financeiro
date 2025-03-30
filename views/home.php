<?php

// Total de RECEITAS no mês atual
$query_receitas = "SELECT SUM(valor) AS total_receitas 
                   FROM tb_receitas 
                   WHERE excluido IS NULL 
                   AND MONTH(data_cadastro) = MONTH(CURDATE()) 
                   AND YEAR(data_cadastro) = YEAR(CURDATE())";
$resultado_receitas = mysqli_query($conn, $query_receitas);
$receitas = mysqli_fetch_array($resultado_receitas);
$total_receitas = $receitas['total_receitas'] ?? 0;

// Total de DESPESAS no mês atual
$query_despesas = "SELECT SUM(valor) AS total_despesas 
                   FROM tb_despesas 
                   WHERE excluido IS NULL 
                   AND MONTH(data_cadastro) = MONTH(CURDATE()) 
                   AND YEAR(data_cadastro) = YEAR(CURDATE())";
$resultado_despesas = mysqli_query($conn, $query_despesas);
$despesas = mysqli_fetch_array($resultado_despesas);
$total_despesas = $despesas['total_despesas'] ?? 0;

// Lucro do mês (Receitas - Despesas)
$lucro_mes = $total_receitas - $total_despesas;

// Listar despesas não pagas
$query_faturas = "SELECT valor, data_cadastro, despesa 
                  FROM tb_despesas 
                  WHERE pago = 0 AND excluido IS NULL";
$resultado_faturas = mysqli_query($conn, $query_faturas);
?>

<div class="container">
    <div class="row align-items-center h-100 justify-content-center">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10  border border-light rounded-5 px-4 mb-5 border-3 text-white sombra mt-3">
            <h1 class="my-2 text-center">Controle Financeiro</h1>
        </div>
        <div class="col-12 text-white">
            <div class="row">
                <div class="col-md-4 bg-success p-3 mb-xxl-3 mb-xl-3 mb-lg-3 mb-md-3 mb-sm-0 mb-0">
                    <h4>Receitas (Mês Atual)</h4>
                    <p class="fs-4">R$ <?= number_format($total_receitas, 2, ',', '.') ?></p>
                </div>

                <div class="col-md-4 bg-danger p-3 mb-xxl-3 mb-xl-3 mb-lg-3 mb-md-3 mb-sm-0 mb-0">
                    <h4>Despesas (Mês Atual)</h4>
                    <p class="fs-4">R$ <?= number_format($total_despesas, 2, ',', '.') ?></p>
                </div>

                <div class="col-md-4 bg-primary p-3 mb-xxl-3 mb-xl-3 mb-lg-3 mb-md-3 mb-sm-0 mb-0">
                    <h4>Lucro (Mês Atual)</h4>
                    <p class="fs-4">R$ <?= number_format($lucro_mes, 2, ',', '.') ?></p>
                </div>
            </div>

            <h4 class="mt-4 text-danger">Faturas Não Pagas:</h4>
            <?php if (mysqli_num_rows($resultado_faturas) > 0) { ?>
                <ul class="list-group lista-faturas">
                    <?php while ($fatura = mysqli_fetch_array($resultado_faturas)) { ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <?= $fatura['despesa'] ?> - R$ <?= ($fatura['valor']) ?>
                            <span class="text-danger">(Vence em <?= date('d/m/Y', strtotime($fatura['data_cadastro'])) ?>)</span>
                        </li>
                    <?php } ?>
                </ul>   
            <?php } else { ?>
                <div class="alert alert-info mt-3">
                    <p class="text-danger m-0">Nenhuma fatura pendente.</p>
                </div>
            <? } ?>
        </div>
    </div>
</div>