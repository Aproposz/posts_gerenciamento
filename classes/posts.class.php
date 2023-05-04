<?php
require_once 'classes/conexao.class.php';

class Posts {
    private $id_post;
    private $titulo_post;
    private $texto_post;
    private $idcategoria;
    private $con;


public function __construct() {
    $this->con = new Conexao();
}

public function adicionar($titulo_post, $texto_post, $idcategoria) {
    try {
        $this->titulo_post = $titulo_post;
        $this->texto_post = $texto_post;
        $this->idcategoria = $idcategoria;
        $sql = $this->con->conectar()->prepare("INSERT INTO posts (titulo_post, texto_post, idcategoria) VALUES(:titulo_post, :texto_post, :idcategoria)");
        $sql->bindValue(":titulo_post", $titulo_post);
        $sql->bindValue(":texto_post", $texto_post);
        $sql->bindValue(":idcategoria", $idcategoria);
        $sql->execute();
        return TRUE;
    } catch (PDOException $ex){
        return 'ERRO: ' . $ex->getMessage();
    }
}

public function listar() {
    try {
        $sql = $this->con->conectar()->prepare("SELECT id_post, titulo_post, texto_post, idcategoria FROM posts");
        $sql->execute();
        return $sql->fetchAll();
    } catch (PDOException $ex) {
          return 'ERRO ' .  $ex->getMessage();
        }
    
}

public function busca($id_post) {
    try {
        $sql = $this->con->conectar()->prepare("SELECT * FROM posts WHERE id_post = :id_post");
        $sql->bindValue(':id_post', $id_post);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetch();
        } else {
            return array();
        }
    } catch (PDOException $ex) {
        return 'ERRO ' . $ex->getMessage();
    }
}

public function editar($titulo_post, $texto_post, $idcategoria, $id_post) {
    try {
        $sql = $this->con->conectar()->prepare("UPDATE posts SET titulo_post = :titulo_post, texto_post = :texto_post, idcategoria = :idcategoria WHERE id_post = :id_post");
        $sql->bindValue(':titulo_post', $titulo_post);
        $sql->bindValue(':texto_post', $texto_post);
        $sql->bindValue(':idcategoria', $idcategoria);
        $sql->execute();
        return TRUE;
    } catch (PDOException $ex) {
        return 'ERRO ' . $ex->getMessage();
    }
}

public function excluir($id_post) {
    $sql = $this->con->conectar()->prepare("DELETE FROM posts WHERE id_post = :id_post");
    $sql->bindValue(':id_post', $id_post);
    $sql->execute();
}

public function traznome ($idcategoria) {
    try{
        $sql = $this->con->conectar()->prepare("SELECT nome FROM categoria WHERE id_categoria = :idcategoria");
        $sql->execute([':idcategoria' => $idcategoria]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }  catch (PDOException $ex) {
        return 'ERRO ' . $ex->getMessage();
    }            
}
}