<?php
include 'classes/posts.class.php';
$post = new Posts();

if(!empty($_POST['titulo_post'])){
    $titulo_post = $_POST['titulo_post'];
    $texto_post = $_POST['texto_post'];
    $idcategoria = $_POST['idcategoria'];

    $post->adicionar($titulo_post, $texto_post, $idcategoria);
    header("Location: index.php");
}


