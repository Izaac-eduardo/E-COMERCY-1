<?php
//abrir uma sessao
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burnes Shop</title>

    <base href="http://<?=$_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"]?>">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.inputmask.min.js"></script>
    <script src="js/jquery.maskedinput-1.2.1.js"></script>
    <script src="js/parsley.min.js"></script>
    <script src="js/sweetalert2.js"></script>

    <script>
        function mensagem(titulo, icone, pagina) {
            Swal.fire({
                title: titulo,
                icone: icone, //error, ok, success, question
            }).then((result) => {
                
                if (icone == "error") {
                    history.back();
                } else {
                    location.href = pagina;
                }

            });
        }
    </script>
</head>

<body>
    <?php
    //verificar se esta logado - senao estiver login
    //se nao esta logado mas esta enviando dados - validacao
    //se estiver logado - mostro a tela do sistema
    if (($_POST) && (!isset($_SESSION["usuario"]))) {
        //validacao do usuario

        require "../controllers/IndexController.php";

        //print_r($_POST);
        $pagina = new IndexController();
        $pagina->verificar($_POST);

    } else if (!isset($_SESSION["usuario"])) {
        //mostrar a tela de login
        require "../views/login/index.php";
    } else if (isset($_SESSION["usuario"])) {
        //mostro a tela do sistema
        require "menu.php";

        //rotas
        if (isset($_GET["param"])) {
            $param = explode("/", $_GET["param"]);
        }

        $controller = $param[0] ?? "index";
        $view = $param[1] ?? "index";
        $id = $param[2] ?? NULL;

        // categoria -> CategoriaController
        $controller = ucfirst($controller)."Controller";

        //incluir o controller
        if (file_exists("../controllers/{$controller}.php")) {
            require "../controllers/{$controller}.php";

            $control = new $controller();
            $control->$view($id);

        } else {
            require "../views/index/erro.php";
        }
        
    } else {
        echo "<p>Requisição inválida</p>";
    }
    ?>
</body>

</html>