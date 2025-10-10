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
}