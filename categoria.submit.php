<?php
include 'classes/categoria.class.php';
$categoria = new Categoria();

if(!empty($_POST['nome'])){
    $nome = $_POST['nome'];

    $categoria->adicionar($nome);
    header("Location: index.php");
}


