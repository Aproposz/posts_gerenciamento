<?php
require_once 'classes/conexao.class.php';

class Categoria {
    private $id_categoria;
    private $nome;
    private $con;

    public function __construct() {
        $this->con = new Conexao();
    }

    public function adicionar($nome) {
        try {
            $sql = $this->con->conectar()->prepare("INSERT INTO categoria(nome) VALUES(:nome)");
            $sql->bindValue(':nome', $nome);
            $sql->execute();
            return TRUE;
        } catch (PDOException $ex) {
            return 'ERRO ' . $ex->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = $this->con->conectar()->prepare("SELECT id_categoria, nome FROM categoria");
            $sql->execute();
            return $sql->fetchAll();
        } catch (PDOException $ex) {
            return 'ERRO ' . $ex->getMessage();
        }
    }
    
    public function busca($id_categoria) {
        try {
            $sql = $this->con->conectar()->prepare("SELECT * FROM categoria WHERE id_categoria = :id_categoria");
            $sql->bindValue('id_categoria', $id_categoria);
            if ($sql->rowCount() > 0) {
                return $sql->fetch();
            } else {
                return array();
            }
        } catch (PDOException $ex) {
            return 'ERRO ' . $ex->getMessage();
          }
    }

    public function editar($nome, $id_categoria) {
        try {
            $sql = $this->con->conectar()->prepare("UPDATE categoria SET nome = :nome WHERE id_categoria = :id_categoria");
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':id_categoria', $id_categoria);
            $sql->execute();
            return TRUE;
        } catch (PDOException $ex) {
            return 'ERRO ' . $ex->getMessage();
        }
    }
    public function excluir($id_categoria) {
        $sql = $this->con->conectar()->prepare("DELETE FROM categoria WHERE id_categoria = :id_categoria");
        $sql->bindValue(':id_categoria', $id_categoria);
        $sql->execute();

    }
}

