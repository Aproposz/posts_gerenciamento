<?php
session_start();
include 'inc/header.php';
include 'classes/usuarios.class.php';

if (!empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);

    $usuario = new Usuarios();

    if ($usuario->fazerLogin($email, $senha)) {
        header("Location: index.php");
        exit;
    } else {
        $erro = "Usuário e/ou senha incorretos!";
    }
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

    .container input[type="email"],
    .container input[type="password"] {
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

    .container .error-message {
        color: red;
        margin-top: 10px;
    }
</style>

<div class="container">
    <h1>LOGIN</h1>

    <form method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha"><br><br>

        <input class="button" type="submit" value="Entrar">
    </form>

    <?php if (isset($erro)) { ?>
        <p class="error-message"><?php echo $erro; ?></p>
    <?php } ?>
</div>

<?php include 'inc/footer.php'; ?>
