<?php
session_start();
include 'menu.php';
include 'botton.php';
include 'classes/categoria.class.php';
include 'classes/posts.class.php';

$categoria_class = new Categoria;
$categorias = $categoria_class->listar();

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

  .container input[type="text"],
  .container select {
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
  <h1>CRIAR POST</h1>

  <form method="post" action="post.submit.php">
    <label for="titulo_post">Título:</label><br>
    <input type="text" id="titulo_post" name="titulo_post"><br><br>
    
    <label for="texto_post">Texto:</label><br>
    <input type="text" id="texto_post" name="texto_post"><br><br>
    
    <label for="idcategoria">Categoria:</label><br>
    <select id="idcategoria" name="idcategoria">
      <?php foreach ($categorias as $categoria) { ?>
        <option value="<?php echo $categoria['id_categoria'] ?>"><?php echo $categoria['nome'] ?></option>
      <?php }; ?>
    </select><br><br>

    <input class="button" type="submit" value="Salvar">
    <a class="button" href="index.php">Voltar</a>
  </form>
</div>
