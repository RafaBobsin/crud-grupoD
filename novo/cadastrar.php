<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar chupeta');

use \App\Entity\Chupeta;
$obChupeta = new Chupeta;

if(isset($_POST['marca'], $_POST['tamanho'], $_POST['cor'], $_POST['estampa'], $_POST['material'], $_POST['valor'])){
    $obChupeta = new Chupeta;
    $obChupeta->marca    = $_POST['marca'];
    $obChupeta->tamanho  = $_POST['tamanho'];
    $obChupeta->cor      = $_POST['cor'];
    $obChupeta->estampa  = $_POST['estampa'];
    $obChupeta->material = $_POST['material'];
    $obChupeta->valor    = $_POST['valor'];

    $obChupeta->cadastrar();
    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';