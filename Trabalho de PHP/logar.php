<?php
session_start();

$usuario_fixo = 'adm';
$senha_hash = password_hash('carlos1', PASSWORD_DEFAULT); 

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($usuario === $usuario_fixo && password_verify($senha, $senha_hash)) {
        $_SESSION['usuario'] = $usuario;
        header('Location: restrito.php');
        exit;
    } else {
        $erro = 'Usuário ou senha inválidos.';
    }
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Login</title>
<link href="CSS/css.logar.css" rel="stylesheet" />
</head>
<body>
    <h1>Login</h1>
    <?php if ($erro): ?><p style="color:red"><?= $erro ?></p><?php endif; ?>
    <form method="post">
        <input type="text" name="usuario" placeholder="usuario"><br>
        <input type="password" name="senha" placeholder="senha"><br>
        <button type="submit">Entrar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
