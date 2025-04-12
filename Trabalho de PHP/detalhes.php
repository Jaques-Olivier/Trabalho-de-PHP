<?php
session_start();
include 'coisas/filtro.php';
include 'coisas/itens.php';

$lista = $itens;
if (isset($_SESSION['novos'])) {
    $lista += $_SESSION['novos'];
}

$id = $_GET['id'] ?? null;
$item = buscarItemPorId($lista, $id);
?>

<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Detalhes do Produto</title>
<link href="CSS/css.detalhes.css" rel="stylesheet" />
</head>
<body>
<?php if ($item): ?>
    <h1><?= $item['titulo'] ?></h1>
    <p><strong>Categoria:</strong> <?= $item['categoria'] ?></p>
    <img src="<?= $item['imagem'] ?>" width="150"><br>
    <p><?= $item['descricao'] ?></p>
    <a href="index.php">Voltar ao catálogo</a>
<?php else: ?>
    <p>Produto não encontrado.</p>
<?php endif; ?>
</body>
</html>
</html>
