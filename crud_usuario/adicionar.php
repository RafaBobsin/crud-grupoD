<?php
    if(isset($_POST['nome'], $_POST['cpf'], $_POST['telefone'])){
        $connection = new PDO("mysql:host=localhost;dbname=chupeta", "root", "");
        $sql = "INSERT INTO cliente (nome, cpf, telefone) VALUES (:nome, :cpf, :telefone)";
        $statement = $connection->prepare($sql);
        $valores = array(
            "nome"=>$_POST['nome'],
            "cpf"=>$_POST['cpf'],
            "telefone"=>$_POST['telefone']
        );
        $statement->execute($valores);
        header('Refresh: 0.1; url=index.php');
    }
?>