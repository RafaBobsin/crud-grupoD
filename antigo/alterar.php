<?php
//Sor MUITO MUITO MUITO obrigada. Te amamos S2!
    $connection = new PDO("mysql:host=localhost;dbname=chupeta", "root", "");

    $row = [];

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $marca = $_POST['marca'];
        $tamanho = $_POST['tamanho'];
        $cor = $_POST['cor'];
        $estampa = $_POST['estampa'];
        $material = $_POST['material'];
        $valor = $_POST['valor'];
    
    
        $sql = "UPDATE `produto` SET `marca` = '$marca', `tamanho` = '$tamanho', `cor` = '$cor', `estampa` = '$estampa', `material` = '$material', `valor` = '$valor' WHERE `produto`.`id_produto` = $id";

        $stnt = $connection->prepare($sql);
        $stnt -> execute();
    
        if($stnt -> rowCount() == 1){
            echo "Alteração realizada!";
            header('location: index.php');
            exit;
        } else {
            echo "Falha de atualização.";
        }
    } 
    
    if(isset($_POST['id_produto'])){
        $id = $_POST['id_produto'];
        $sql = "SELECT * FROM produto WHERE id_produto=$id";
        
        $stnt = $connection->prepare($sql);
        $stnt -> execute();

        if($stnt -> rowCount() == 1){
            $row = $stnt->fetch();
        }
    }
    
?>

<h2>Editar chupeta</h2>
<form action="alterar.php" method="post">

    <label for="marca">ID: </label>
    <input type="text" name="id" readonly value="<?=$row['id_produto']?>">

    <label for="marca">Marca: </label>
    <input type="text" name="marca" required value="<?=$row['marca']?>">

    <label for="tamanho">Tamanho: </label>
    <input type="text" name="tamanho" value="<?=$row['tamanho']?>">

    <label for="cor">Cor: </label>
    <input type="text" name="cor" value="<?=$row['cor']?>"><br>

    <label for="estampa">Estampa: </label>
    <input type="text" name="estampa" value="<?=$row['estampa']?>">

    <label for="material">Material: </label>
    <input type="text" name="material" value="<?=$row['material']?>">

    <label for="valor">Valor: </label>
    <input type="text" name="valor" required value="<?=$row['valor']?>">

    <input type="submit" value="Enviar"/>

</form>