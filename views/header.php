<header>
    <nav class="navbar navbar-expand-lg bg-2 border-bottom">
        <div class="container-fluid px-xxl-5 px-xl-5 px-lg-5 px-md-5 px-sm-3">
            <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="collapse navbar-collapse row" id="navbarNav">
                <div class="col-12 col-md-8">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link active text-white fs-6 pb-1" aria-current="page" href="<?= SITE ?>home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white fs-6 pb-1" aria-current="page" href="<?= SITE ?>receitas">Receitas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white fs-6 pb-1" aria-current="page" href="<?= SITE ?>despesas">Despesas</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                <label for="" class="text-white">Saldo:</label>
                <div class="d-flex align-items-center">
                    <?php
                    $saldo = isset($dados['saldo']) ? $dados['saldo'] : 0.00;
                    $saldoVisivel = $_SESSION['saldo_visivel'] ?? false;
                    ?>
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10">
                        <input
                            type="<?= $saldoVisivel ? 'text' : 'password' ?>"
                            id="saldo"
                            class="form-control input-sensivel text-center fs-saldo-mobile"
                            value="R$ <?= formatarValorReais3($saldo); ?>"
                            disabled>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-2 col-2">
                        <img
                            src="https://img.icons8.com/?size=100&id=<?= $saldoVisivel ? '60022' : '59814' ?>&format=png&color=FFFFFF"
                            alt="Exibir"
                            id="toggle-olho"
                            class="icone-olho">
                    </div>
                </div>
            </div>
            <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-2 col-2 text-center">
                <a class="nav-link active text-white fs-6 w-100 bg-danger rounded-pill py-1" aria-current="page" href="<?= SITE ?>controllers/sair.php">Sair</a>
            </div>
        </div>
    </nav>
</header>
<?php include_once('modulos/mensagem.php') ?>