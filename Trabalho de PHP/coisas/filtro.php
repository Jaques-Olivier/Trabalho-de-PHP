<?php
function buscarItemPorId($lista, $id) {
    return $lista[$id] ?? null;
}

function filtrarPorCategoria($lista, $categoria) {
    $resultado = [];
    foreach ($lista as $item) {
        if (strtolower($item['categoria']) === strtolower($categoria)) {
            $resultado[$item['id']] = $item;
        }
    }
    return $resultado;
}
