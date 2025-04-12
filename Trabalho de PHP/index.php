<?php
session_start();
include 'coisas/itens.php';
include 'coisas/filtro.php';

$lista = $itens;

if (isset($_SESSION['novos'])) {
    $lista += $_SESSION['novos'];
}
?>



<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Catálogo Artesanal</title>
<link href="CSS/css.index.css" rel="stylesheet" />
</head>
<body>
    <h1 class="nav-links">Produtos Artesanais</h1>
    <div class="nav-links">
    <a href="filtrar.php">Filtrar por categoria</a> |
    <a href="logar.php">Área restrita</a>
    </div>
    <hr>
    <?php foreach ($lista as $item): ?>
        <div class="card">
            <h2><?= $item['titulo'] ?></h2>
            <p><strong>Categoria:</strong> <?= $item['categoria'] ?></p>
            <img src="<?= $item['imagem'] ?>" alt="<?= $item['titulo'] ?>" width="100"><br>
            <a href="detalhes.php?id=<?= $item['id'] ?>"style="color:white" >>Ver mais</a>
        </div>
    <?php endforeach; ?>
</body>
</html>
