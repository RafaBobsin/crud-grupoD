<?php

    require __DIR__.'/vendor/autoload.php';

    define('TITLE','Editar chupeta');

    use \App\Entity\Chupeta;

    if(!isset($_GET['id_produto']) or !is_numeric($_GET['id_produto'])){
        header('location: index.php?status=error');
        exit;
    }

    $obChupeta = Chupeta::getChupeta($_GET['id_produto']);

    if(!$obChupeta instanceof Chupeta){
        header('location: index.php?status=error');
        exit;
    }

    if(isset($_POST['marca'],$_POST['tamanho'],$_POST['cor'],$_POST['estampa'],$_POST['material'],$_POST['valoe'])){

        $obChupeta->marca    = $_POST['marca'];
        $obChupeta->tamanho  = $_POST['tamanho'];
        $obChupeta->cor      = $_POST['cor'];
        $obChupeta->estampa  = $_POST['estampa'];
        $obChupeta->material = $_POST['material'];
        $obChupeta->valor    = $_POST['valor'];
        $obChupeta->atualizar();

        header('location: index.php?status=success');
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formulario.php';
    include __DIR__.'/includes/footer.php';