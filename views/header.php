<header class="">
    <nav class="navbar navbar-expand-lg bg-2 border-bottom">
        <div class="container-fluid px-xxl-5 px-xl-5 px-lg-5 px-md-5 px-sm-3">
            <div class="collapse navbar-collapse row" id="navbarNav">
                <div class="col-8">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link active text-white fs-6 pb-1" aria-current="page" href="<?= SITE ?>home">Home</a>
                            <!-- <a class="nav-link active text-white fs-6 pb-1" aria-current="page" href="<?= SITE ?>despesas">Despesas</a> -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white fs-6 pb-1" aria-current="page" href="<?= SITE ?>receitas">Receitas</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active text-white fs-6 pb-1" aria-current="page" href="<?= SITE ?>despesas">Despesas</a>
                        </li>
                    </ul>
                </div>
                <!-- <div class="col-3">
                    <form action="<?php SITE ?>controllers/inserir_entrada.php" method="POST">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <label for="" class="form-label text-white fs-topo">Entrada: </label>
                                <input type="text" name="entrada" class="form-control mb-2" id="valorEntrada">
                            </div>
                            <div class="col-4 mt-4">
                                <div class="d-flex align-items-center h-100 justify-content-center">
                                    <input type="submit" class="btn btn-outline-success" value="Inserir"><i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-3">
                    <form action="<?php SITE ?>controllers/retirar_entrada.php" method="POST">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <label for="" class="form-label text-white fs-topo">Saída: </label>
                                <input type="text" name="entrada" class="form-control mb-2" id="valorSaida">
                            </div>
                            <div class="col-4 mt-4">
                                <div class="d-flex align-items-center h-100 justify-content-center">
                                    <input type="submit" class="btn btn-outline-danger" value="Retirar"><i class="fa-solid fa-minus"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> -->
                <div class="col-3">
                    <label for="" class="form-label text-white">Saldo:</label>
                    <div class="d-flex align-items-center">
                        <?php
                        $saldo = isset($dados['saldo']) ? $dados['saldo'] : 0.00;
                        $saldoVisivel = $_SESSION['saldo_visivel'] ?? false;
                        ?>
                        <div class="col-8">
                            <input
                                type="<?= $saldoVisivel ? 'text' : 'password' ?>"
                                id="saldo"
                                class="form-control input-sensivel"
                                value="R$ <?= formatarValorReais3($saldo); ?>"
                                disabled>
                        </div>
                        <div class="col-4co">
                            <img
                                src="https://img.icons8.com/?size=100&id=<?= $saldoVisivel ? '60022' : '59814' ?>&format=png&color=FFFFFF"
                                alt="Exibir"
                                id="toggle-olho"
                                class="icone-olho">
                        </div>
                    </div>
                </div>
                <div class="col-1 text-center">
                        <a class="nav-link active text-white fs-6 w-100 bg-danger rounded-pill py-1" aria-current="page" href="<?= SITE ?>controllers/sair.php">Sair</a>
                </div>


            </div>
        </div>
    </nav>
</header>
<?php include_once('modulos/mensagem.php') ?>