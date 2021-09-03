<?php

    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Chupeta;

    if(!isset($_GET['id_produto']) or !is_numeric($_GET['id_produto'])){
        header('location: index.php?status=error');
        exit;
    }

    $obChupeta = Chupeta::getChupeta($_GET['produto']);

    if(!$obChupeta instanceof Chupeta){
        header('location: index.php?status=error');
        exit;
    }

    if(isset($_POST['excluir'])){

        $obChupeta->excluir();

        header('location: index.php?status=success');
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/confirmar-exclusao.php';
    include __DIR__.'/includes/footer.php';