<?php

class Categoria
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function salvarDados($dados)
    {
        if (empty($dados['id'])) {
            $sql = "insert into categoria (nome, ativo) values (:nome, :ativo)";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":ativo", $dados['ativo']);
            $consulta->bindParam(":nome", $dados['nome']);
        } else {
            $sql = "update categoria set nome = :nome, ativo = :ativo where id = :id limit 1";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(":ativo", $dados['ativo']);
            $consulta->bindParam(":nome", $dados['nome']);
            $consulta->bindParam(":id", $dados['id']);
        }
        return $consulta->execute();
    }
}
