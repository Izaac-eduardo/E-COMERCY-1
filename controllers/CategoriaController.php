<?php

require "..//config/Conexao.php";
require "..//models/Categoria.php";

class CategoriaController{
    private $categoria;

   public function __construct()
   {
    $conexao = new conexao();
    $pdo = $conexao->conectar();
    $this->categoria = new Categoria($pdo);
   }
   public function index($id){
    require "../views/categoria/index.php";
   }

   public function salvar(){
    $nome = trim($_POST['nome'] ?? NULL);
    $ativo = trim($_POST['ativo'] ?? NULL);

    if (empty($nome)){
      echo "<script>mensagem('O nome é obrigatorio', 'error', '');</script>";
      exit;
   }else if (empty($ativo)){
      echo "<script>mensagem('O campo ativo é obrigatorio', 'error', '');</script>";
      exit;
   }
   

   $msg =  $this->categoria->salvarDados($_POST);

   if ($msg == 1){
       echo "<script>mensagem('deu certo','ok','categoria/salvar');</script>";
   }else{
       echo "<script>mensagem('deu errado','error','');</script>";
       exit;
   }

}
}