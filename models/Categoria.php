<?php
    class Categoria {

        private $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function salvarDados($dados) {
            //verificando se o ID esta vazio
            if (empty($dados["id"])) {
                //inserir
                $sql = "insert into categoria (nome, ativo)
                values (:nome, :ativo)";
                $consulta = $this->pdo->prepare($sql);
                $consulta->bindParam(":ativo", $dados["ativo"]);
                $consulta->bindParam(":nome", $dados["nome"]);
            } else {
                //atualizar
                $sql = "update categoria set nome = :nome, ativo = :ativo
                where id = :id limit 1";
                $consulta = $this->pdo->prepare($sql);
                $consulta->bindParam(":ativo", $dados["ativo"]);
                $consulta->bindParam(":nome", $dados["nome"]);
                $consulta->bindParam(":id", $dados["id"]);
            }

            return $consulta->execute();
        }

        public function listar() {
            $sql = "select * from categoria order by nome";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }

        public function getDados($id) {
            $sql = "select * from categoria where id = :id limit 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":id", $id);
            $consulta->execute();

            return $consulta->fetch(PDO::FETCH_OBJ);
        }

        public function excluir($id) {
            $sql = "delete from categoria where id = :id limit 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":id", $id);

            return $consulta->execute();
        }

        public function getProdutos($id) {
            $sql = "select id from produto where categoria_id = :id limit 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":id", $id);
            $consulta->execute();

            return $consulta->fetch(PDO::FETCH_OBJ);
        }
    }