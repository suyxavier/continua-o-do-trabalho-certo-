<?php

    require_once '../modelos/CategoriaCrud.php';
    require_once '../views/categorias/templates/cabecalho.php';
    require_once '../views/categorias/templates/rodape.php';

    $crud = new CategoriaCrud();
    $categoria = $crud->getCategorias();

    if (isset($_GET['acao'])){
        $acao = $_GET['acao'];
    }else{
        $acao = 'index';
    }

    switch ($acao){

            case'index':

                $crud = new CategoriaCrud();
                $categorias = $crud->getCategorias();
                include '../views/categorias/templates/cabecalho.php';
                include '../views/categorias/index.php';
                include '../views/categorias/templates/rodape.php';
                break;

            case 'show';

                $id = $_GET['id'];
                $crud = new CategoriaCrud();
                $categoria = $crud->getCategoria($id);
                include '../views/categorias/templates/cabecalho.php';
                include '../views/categorias/show.php';
                include '../views/categorias/templates/rodape.php';
                break;

        default:
            echo 'Acao invlida';

    }



