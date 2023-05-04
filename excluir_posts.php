<?php
session_start();
include 'classes/posts.class.php';
$posts = new Posts();

if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
  }
  

if(!empty($_GET['id_post'])){
    $id_post = $_GET['id_post'];
    $posts->excluir($id_post);
    header("Location: /posts_gerenciamento/index.php");
}else{
    echo '<script type="text/javascript">alert("Erro ao excluir a sala!");</script>';
    header("Location: /posts_gerenciamento/index.php");

}