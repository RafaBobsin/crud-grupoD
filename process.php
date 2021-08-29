<?php $connection = new PDO("mysql:host=localhost;dbname=chupeta", "root", ""); ?>


<?php

    if(isset($_GET['update'])){
        $id = $_GET['update'];
        $update = true;
        $result = $connection->query("SELECT * FROM produto WHERE id_produto=$id");
        $record = mysqli_fetch_array($result);

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
?>