<?php
session_start();
include 'coisas/filtro.php';
include 'coisas/itens.php';

$lista = $itens;
if (isset($_SESSION['novos'])) {
    $lista += $_SESSION['novos'];
}

$categoria = $_GET['categoria'] ?? '';
$resultado = $categoria ? filtrarPorCategoria($lista, $categoria) : $lista;
?>

<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Filtrar Produtos</title>
<link href="CSS/css.Filtro.css" rel="stylesheet" />
</head>
<body>
    <h1>Filtrar por Categoria</h1>
    <form method="get">
        <input type="text" name="categoria" placeholder="Ex: Decoração, Higiene" 
        value="<?= htmlspecialchars($categoria) ?>">
        <button type="submit">Filtrar</button>
    </form>
    <a href="index.php">Voltar</a>
    <hr>

    <?php foreach ($resultado as $item): ?>
        <div style="border:1px solid #ccc; margin:10px; padding:10px;">
            <h2><?= $item['titulo'] ?></h2>
            <p><strong>Categoria:</strong> <?= $item['categoria'] ?></p>
            <a href="detalhes.php?id=<?= $item['id'] ?>">Ver mais</a>
        </div>
    <?php endforeach; ?>
</body>
</html>
