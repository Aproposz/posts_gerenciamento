<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Posts</title>
    <link rel="stylesheet" href="css/styles.css"/>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .menu a {
            color: #fff;
            text-decoration: none;
            margin-right: 20px;
        }

        .menu a.active {
            font-weight: bold;
        }

        .menu a:hover {
            color: #ff6600;
        }
    </style>
</head>

<body>
    <header>
        <div class="menu">
            <a href="index.php" class="active">HOME</a>
            <a href="categoria.php">CATEGORIAS</a>
            <a href="posts.php">POSTAR</a>
            <a href="login.php">LOGIN</a>
            <?php if(isset($_SESSION['logado'])): ?>
            <a href="sair.php">DESLOGAR</a>
            <?php endif; ?>   
        </div>
    </header>

    <!-- Resto do seu conteúdo aqui -->

</body>
</html>
