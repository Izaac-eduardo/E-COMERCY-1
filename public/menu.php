<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="index">
            <img src="images/logo.png" alt="Burnes Shop">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="index">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="categoria">Categoria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produto">Produto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usuario">Usuários</a>
                </li>
            </ul>
            <div class="d-flex">
                Olá <?=$_SESSION["usuario"]["nome"]?>
                <a href="sair.php" class="btn btn-danger btn-sm">
                    <i class="fas fa-power-off"></i> Sair
                </a>
            </div>
        </div>
    </div>
</nav>