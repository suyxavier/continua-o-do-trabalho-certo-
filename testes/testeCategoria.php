<?php

require_once '../app/modelos/Categoria.php';
require_once '../app/modelos/CategoriaCrud.php';

$catiguria = new Categoria(10, 'IFC Cultura', 'Um evento de cultura de coisas');

$catcrud = new CategoriaCrud();

$catcrud->insertCategoria($catiguria);
