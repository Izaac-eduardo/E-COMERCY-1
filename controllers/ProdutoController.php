<?php
    require "../config/Conexao.php";
    require "../models/Produto.php";
    require "../models/Categoria.php";

    class ProdutoController {

        private $produto;
        private $categoria;

        public function __construct()
        {
            $conexao = new Conexao();
            $pdo = $conexao->conectar();

            $this->produto = new Produto($pdo);
            $this->categoria = new Categoria($pdo);
        }

        public function index($id) {
            require "../views/produto/index.php";
        }

    }