<?php
    $connection = new PDO("mysql:host=localhost;dbname=chupeta", "root", "");
    
    if(isset($_POST['delete'])){
        $id = $_POST['delete'];
        $sql = "DELETE FROM `produto` WHERE `id_produto` = '{$id}'";

        $result = $connection->query($sql);
        header('Refresh: 0.1; url=index.php');
    }
?>