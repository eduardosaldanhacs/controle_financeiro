<div class="container">
    <div class="row align-items-center h-100 justify-content-center">
        <div class="col-6 border border-dark rounded-5 px-4 mb-5 border-3 text-white sombra me-5 mt-3">
            <h1 class="my-2">Controle Financeiro</h1>
        </div>
        <div class="col-12 text-white">
            <?php
            $query_gastos = "SELECT SUM(valor) AS total_gasto 
                                FROM tb_receitas 
                                WHERE excluido IS NULL AND MONTH(data_cadastro) = MONTH(CURDATE()) AND YEAR(data_cadastro) = YEAR(CURDATE());
                            ";
            $resultado_gastos = mysqli_query($conn, $query_gastos);
            $gastos = mysqli_fetch_array($resultado_gastos);
            $total_gasto = $gastos['total_gasto'];
            ?>
            <p class="text-white">Total gasto no último mes: R$ <?= $total_gasto ?></p>

            
            <p>Fatura não pagas:</p>
        </div>
    </div>
</div>