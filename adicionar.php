<?php
    if(isset($_POST['marca'], $_POST['tamanho'], $_POST['cor'], $_POST['estampa'], $_POST['material'], $_POST['valor'], )){
        $connection = new PDO("mysql:host=localhost;dbname=chupeta", "root", "");
        $sql = "INSERT INTO produto (marca, tamanho, cor, estampa, material, valor) VALUES (:marca, :tamanho, :cor, :estampa, :material, :valor)";
        $statement = $connection->prepare($sql);
        $valores = array(
            "marca"=>$_POST['marca'],
            "tamanho"=>$_POST['tamanho'],
            "cor"=>$_POST['cor'],
            "estampa"=>$_POST['estampa'],
            "material"=>$_POST['material'],
            "valor"=>$_POST['valor']
        );
        $statement->execute($valores);
        header('Refresh: 0.1; url=index.php');
    }
?>