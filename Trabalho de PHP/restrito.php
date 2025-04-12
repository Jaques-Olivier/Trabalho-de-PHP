<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remover_id'])) {
    $id = $_POST['remover_id'];
    if (isset($_SESSION['novos'][$id])) {
        unset($_SESSION['novos'][$id]);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $imagem = $_POST['imagem'] ?? '';

    if ($titulo && $categoria && $descricao && $imagem) {
        $id = time();

        $novo = [
            'id' => $id,
            'titulo' => $titulo,
            'categoria' => $categoria,
            'descricao' => $descricao,
            'imagem' => $imagem,
        ];

        $_SESSION['novos'][$id] = $novo;
        header('Location: index.php');
        exit;
    } else {
        echo "<p style='color:red;'>coloque as informações</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Área Administrativa</title>
<link href="CSS/css.restrito.css" rel="stylesheet" />
</head>
<body>
    <h1>Bem-vindo, <?= $_SESSION['usuario'] ?></h1>
    <h2>Cadastrar novo produto artesanal</h2>
    <form method="post" class="admin-form">
        <input type="text" name="titulo" placeholder="Nome do produto" required><br>
        <input type="text" name="categoria" placeholder="Categoria" required><br>
        <input type="text" name="imagem" placeholder="URL da imagem" required><br>
        <textarea name="descricao" placeholder="Descrição do produto" required></textarea><br>
        <button type="submit">Cadastrar</button>
    </form>
    <h2>Seus Produtos Cadastrados</h2>
<?php if (!empty($_SESSION['novos'])): ?>
    <?php foreach ($_SESSION['novos'] as $item): ?>
        <div class="produto-card">
            <h3><?= htmlspecialchars($item['titulo']) ?></h3>
            <p><strong>Categoria:</strong> <?= htmlspecialchars($item['categoria']) ?></p>
            <img src="<?= htmlspecialchars($item['imagem']) ?>" width="100"><br>
            <p><?= htmlspecialchars($item['descricao']) ?></p>
            <form method="post" class="remover-form">
                <input type="hidden" name="remover_id" value="<?= $item['id'] ?>">
                <button type="submit" onclick="return confirm('remover?')">Remover</button>
            </form>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>você ainda não cadastrou nenhum produto.</p>
<?php endif; ?>
    <a href="index.php" style="color:white">Voltar ao catálogo</a>
</body>
</html>
