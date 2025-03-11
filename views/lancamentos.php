<div class="container">
    <div class="row align-items-center h-100 justify-content-center py-5">
        <div class="col-6 border border-primary rounded-5 px-4 mb-5 border-3 text-white bg-light shadow-lg me-5">
            <form action="cadastrar_lancamento.php" method="POST">
                <h1 class="my-3 text-primary text-center"> Cadastrar Lançamentos</h1>
                <label for="" class="form-label pt-3 text-secondary">Despesas</label>
                <select class="form-select mb-4" name="despesa" id="">
                    <?php
                    $sql = "SELECT * FROM tb_despesas";
                    $query = mysqli_query($conexao, $sql);
                    while ($despesa = mysqli_fetch_array($query)) { ?>
                        <option value="<?php echo $despesa['despesas'] ?>"> <?php echo $despesa['despesas'] ?></option>';
                    <?php } ?>
                    <option value=""></option>
                </select>

                <label for="" class="form-label text-secondary">Valor</label>
                <input type="text" class="form-control mb-4" required name="valor" id="valor">
                <label for="" class="form-label text-secondary">data</label>
                <input type="date" class="form-control mb-4" required name="data">
                <label for="" class="form-label text-secondary">Pago</label>
                <select name="pago" id="" class="form-select mb-2">
                <option value="S">Sim</option>
                <option value="N">Nao</option>
                </select>
                <div class="text-center pb-3">
                    <button type="submit" class="btn btn-primary btn-lg">Enviar Lançamento</button>
                </div>
            </form>
        </div>
    </div>
</div>
