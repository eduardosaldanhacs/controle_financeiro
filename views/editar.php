<?php
$buscar_lancamentos = "SELECT * from tb_lancamentos where id=$id";
$resultado = mysqli_query($conexao, $buscar_lancamentos);
$dados = mysqli_fetch_array($resultado); 
?>
<div class="container">
    <div class="row align-items-center h-100 justify-content-center py-5">
        <div class="col-6 border border-dark rounded-5 px-4 mb-5 border-3 text-white sombra me-5">
            <form action="atualizar.php?id=<?php echo $id; ?>" method="POST">
                <div>
                    <h1 class="py-3">Editar Lançamentos</h1>
                    <label for="" class="form-label pt-3">
                        Nome Despesa
                    </label>
                    <input type="text" name="despesa" class="form-control mb-2" required value="<?php echo isset($dados['despesa']) ? $dados['despesa'] : ''; ?>" id="despesa">
                </div>
                <div>
                    <label for="" class="form-label">
                        Valor
                    </label>
                    <input type="text" name="valor" class="form-control mb-2" required id="valor" maxlength='3' value="<?php echo $dados['valor']; ?>">
                </div>
                <div>
                    <label for="" class="form-label">
                        Data de Lançamento
                    </label>
                    <input type="date" name="data" class="form-control mb-2" required id="data" maxlength='3' value="<?php echo $dados['data_lancamentos']; ?>">
                </div>
                <div>
                    <label for="" class="form-label">Pago</label>
                    <select name="pago" id="" class="form-select mb-2 checkbox-pago">
                        <?php if ($dados['pago'] == 'S') {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        } ?>
                        <option value="N">Nao</option>
                        <option value="S" <?php echo $selected ?>>Sim</option>
                    </select>
                </div>
                <div class="text-center pb-3">
                    <button type="submit" class="btn btn-primary btn-lg">enviar cadastro</button>
                </div>
                <div class="text-center pb-3">
                    <a href="<?= SITE ?>painel/listagens.php"><button type="button" class="btn btn-danger btn-lg">Sair</button></a>
                </div>
            </form>
        </div>
    </div>
</div>