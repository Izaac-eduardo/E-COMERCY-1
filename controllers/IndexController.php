<?php
require"../config/conexao.php";
require"../models/Usuario.php";

class IndexController{

private $usuario;


public function __construct()
{
    $conexao = new Conexao();  
    $pdo = $conexao->conectar();

    $this->usuario = new Usuario($pdo);

}

public function verificar ($dados){
    $email = $dados['email'] ?? NULL;
    $senha = $dados['senha'] ?? NULL;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<scrept>mensagem('Digite um Email valido', 'error', '');</scrept>";
        exit;
    } else if
 (empty($senha)) {
echo "<script>mensagem('Digite a senha', 'error', '');</script>";
    exit;

   
}

$dadosUsuario = $this->usuario->getEmailUsuario($email);

if (empty($dadosUsuario->id)){
    echo "<script>mensagem('Usuario não invalido', 'error', '');</script>";
    exit;   
} else if (!password_verify($senha, $dadosUsuario->senha)){
    echo "<script>mensagem('Senha invalida', 'error', '');</script>";
    exit;   
} else {
    $_SESSION["usuario"] = array(
        "id" => $dadosUsuario->id,
        "nome" => $dadosUsuario->nome,
        "email" => $dadosUsuario->email
    );
    echo "<script>location.href='index.php'</script>";
}
}
   }
