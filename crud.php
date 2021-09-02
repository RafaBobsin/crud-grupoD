<?php

    $connection = new mysqli('localhost', 'root', '', 'chupeta');

    $marca = '';
    $tamanho = '';
    $cor = '';
    $estampa = '';
    $material = '';
    $valor = '';

    if(isset($_POST['adicionar'])){
        $marca = $_POST['marca'];
        $tamanho = $_POST['tamanho'];
        $cor = $_POST['cor'];
        $estampa = $_POST['estampa'];
        $material = $_POST['material'];
        $valor = $_POST['valor'];

        $connection->query("INSERT INTO produto (marca, tamanho, cor, estampa, material, valor) VALUES ('$marca', '$tamanho', '$cor', '$estampa', '$material', '$valor')");
    }

    if(isset($_GET['deletar'])){
        $id = $_GET['deletar'];
        
        $connection->query("DELETE FROM produto WHERE id_produto=$id");
    }

    if(isset($_GET['selecionar'])){
        $id = $_GET['selecionar'];
        $alterar = true;
        $result = $connection->query("SELECT * FROM produto WHERE id_produto=$id");

        if(count($result)==1){
            $row = $result->fetch_array();
            $marca = $row['marca'];
            $tamanho = $row['tamanho'];
            $cor = $row['cor'];
            $estampa = $row['estampa'];
            $material = $row['material'];
            $valor = $row['valor'];
        }
    }

    if(isset($_POST['alterar'])){
        $id = $_POST['id_produto'];
        $marca = $_POST['marca'];
        $tamanho = $_POST['tamanho'];
        $cor = $_POST['cor'];
        $estampa = $_POST['estampa'];
        $material = $_POST['material'];
        $valor = $_POST['valor'];

        $connection->query("UPDATE produto SET marca='$marca', tamanho='$marca='$marca', tamanho', cor='$cor', estampa='$estampa', material='$material', valor='$valor' WHERE id_produto=$id");

        header('location: index.php');
    }
?>