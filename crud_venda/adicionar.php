<?php
    if(isset($_POST['id_cliente'], $_POST['id_produto'], $_POST['valor'], $_POST['data'], $_POST['quantidade'])){
        $connection = new PDO("mysql:host=localhost;dbname=chupeta", "root", "");
        $sql = "INSERT INTO produto (id_cliente, id_produto, valor, data, quantidade) VALUES (:id_cliente, :id_produto, :valor, :data, :quantidade)";
        $statement = $connection->prepare($sql);
        $valores = array(
            "id_cliente"=>$_POST['id_cliente'],
            "id_produto"=>$_POST['id_produto'],
            "valor"=>$_POST['valor'],
            "data"=>$_POST['data'],
            "quantidade"=>$_POST['quantidade']
        );
        $statement->execute($valores);
        header('Refresh: 0.1; url=index.php');
    }
?>