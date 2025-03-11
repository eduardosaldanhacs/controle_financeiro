<header class="">
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid px-xxl-5 px-xl-5 px-lg-5 px-md-5 px-sm-3">
            <div class="collapse navbar-collapse row" id="navbarNav">
                <div class="col-6">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link active text-white fs-5 pb-1" aria-current="page" href="<?= SITE?>despesas&id=<?php echo $id ?>">Despesas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white fs-5 pb-1" aria-current="page" href="<?= SITE ?>lancamentos">Lançamentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white fs-5 pb-1" aria-current="page" href="<?= SITE ?>listagens">Listagens</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white fs-5 pb-1" aria-current="page" href="<?= SITE ?>controllers/sair.php">Sair</a>
                        </li>
                    </ul>
                </div>
                <div class="col-2">
                    <form action="<?php SITE ?>controllers/inserir_entrada.php" method="POST">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <label for="" class="form-label text-white">Entrada: </label>
                                <input type="text" name="entrada" class="form-control mb-2" id="valorEntrada">
                            </div>
                            <div class="col-4 mt-4">
                                <button type="submit" class="btn btn-outline-light"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-2">
                    <form action="<?php SITE ?>controllers/retirar_entrada.php" method="POST">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <label for="" class="form-label text-white">Saída: </label>
                                <input type="text" name="entrada" class="form-control mb-2" id="valorSaida">
                            </div>
                            <div class="col-4 mt-4">
                                <button type="submit" class="btn btn-outline-light"><i class="fa-solid fa-minus"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-2">
                    <label for="" class="form-label text-white">Saldo: </label>
                    <div class="d-flex align-items-center">
                        <?php
                        $saldo = isset($dados['saldo']) ? $dados['saldo'] : 0.00;
                        ?>
                        <input type="password" id="saldo" class="form-control input-sensivel" value="R$ <?= formatarValorReais3($saldo); ?>" disabled>
                        <img src="https://img.icons8.com/?size=100&id=60022&format=png&color=FFFFFF" alt="Exibir" id="toggle-olho" class="icone-olho">
                    </div>
                </div>


            </div>
        </div>
    </nav>
</header>