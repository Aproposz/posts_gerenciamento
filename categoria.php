<?php
session_start();
include 'classes/categoria.class.php';
include 'menu.php';
include 'botton.php';
include 'inc/header.php';

if (!isset($_SESSION['logado'])) {
  header("Location: login.php");
  exit;
}
?>

<style>
  .container {
    width: 400px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #f8f8f8;
    text-align: center;
  }

  .container h1 {
    margin-bottom: 20px;
  }

  .container input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .container .button {
    display: inline-block;
    padding: 10px 20px;
    margin-right: 10px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .container .button:hover {
    background-color: #555;
  }
</style>

<div class="container">
  <h1>CRIAR CATEGORIA</h1>

  <form method="post" action="categoria.submit.php">
    Nome: <br>
    <input type="text" name="nome"><br><br>
    <input class="button" type="submit" value="SALVAR">
    <a class="button" href="index.php">VOLTAR</a>
  </form>
</div>

<?php include 'inc/footer.php'; ?>
