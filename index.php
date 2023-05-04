<?php
session_start();
include 'classes/posts.class.php';
include 'menu.php';
include 'botton.php';
include 'inc/header.php';
include 'inc/footer.php';

$post = new Posts();
$lista = $post->listar();
?>

<style>
  table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px auto;
    background-color: #f8f8f8;
  }

  table th,
  table td {
    padding: 10px;
    text-align: left;
  }

  table th {
    background-color: #333;
    color: #fff;
  }

  table tr:nth-child(even) {
    background-color: #f2f2f2;
  }
</style>

<h2>Listagem de Posts</h2>

<table>
  <thead>
    <tr>
      <th>Título</th>
      <th>Categoria</th>
      <th>Texto</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lista as $item) { ?>
    <tr>
      <td><?php echo $item['titulo_post']; ?></td>
      <td>
        <?php
          $categoria = $post->traznome($item['idcategoria']);
          echo $categoria['nome'];
        ?>
      </td>
      <td><?php echo $item['texto_post']; ?></td>
      <td>
      
        <a href="excluir_posts.php?id_post=<?php echo $item['id_post']; ?>">Excluir</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
