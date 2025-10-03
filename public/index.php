<?php 
// a função deste index é apenas para direcionar para as páginas corretas

//abrir sessão
session_start();

// echo $_SESSION['nome'];
// var_dump($_SESSION['carrinho']);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loxinha</title>

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
                icone: icone,

            }).then((result) => {
                if (icone == "error"){
                    history.back();
                } else {
                    location.href = pagina;
                }
            });
        }
    </script>

</head>
<body style="background-image: url('../img/fundo.jpg'); background-size: cover;">

<?php 

// MOSTRAR O PARAM DO .HTACESS
// echo $_GET['param'] ?? 'Nenhum parâmetro informado';


//VERIFICAR SE ESTA LOGADO - SENAO ESTIVER LOGIN
//SE NAO TIVER LOGADO MAS ESTA ENVIANDO DADOS - VALIDAÇÃO
//SE ESTIVER LOGADO - MOSTRO A TELA DO SISTEMA
if ( ($_POST) && (!isset($_SESSION['usuario']))) {
    //validacao do usuario

require "../controllers/IndexController.php";

//print_r($_POST);
$pagina  = new IndexController();
$pagina->verificar($_POST);





} else if ( !isset($_SESSION['usuario'])) {
    require "../views/login/index.php";
    //mostra a tela do sistema
} else if ( isset($_SESSION['usuario'])) {
    //echo"oi";
    require "../home.php";
    //mostro a tela do sistema
} else {
    echo "<p>Requisição invalida</p>";
}

?>
    
</body>
</html>