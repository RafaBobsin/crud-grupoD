<link rel="stylesheet" type="text/css" href="styles/main.css">
<link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;600;700;800&display=swap" rel="stylesheet">
<title>Loja de Chupeta - Editar</title>

<?php
//Sor MUITO MUITO MUITO obrigada. Te amamos S2!
    $connection = new PDO("mysql:host=localhost;dbname=chupeta", "root", "");

    $row = [];

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $id_cliente = $_POST['id_cliente'];
        $id_produto = $_POST['id_produto'];
        $valor = $_POST['valor'];
        $data = $_POST['data'];
        $quantidade = $_POST['quantidade'];
    
        $sql = "UPDATE `venda` SET `id_cliente` = '$id_cliente', `id_produto` = '$id_produto', `valor` = '$valor', `data` = '$data', `quantidade` = '$quantidade' WHERE `venda`.`id_venda` = $id";

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
    
    if(isset($_POST['id_venda'])){
        $id = $_POST['id_venda'];
        $sql = "SELECT * FROM venda WHERE id_venda=$id";
        
        $stnt = $connection->prepare($sql);
        $stnt -> execute();

        if($stnt -> rowCount() == 1){
            $row = $stnt->fetch();
        }
    }
    
?>

<h2 id="tituloEdit">Editar chupeta</h2>
<form action="alterar.php" method="post">

    <label for="marca">ID: </label>
    <input type="text" name="id" readonly value="<?=$row['id_produto']?>">

    <label for="id_cliente">id_cliente: </label>
    <input type="text" name="id_cliente" required value="<?=$row['id_cliente']?>">

    <label for="id_produto">id_produto: </label>
    <input type="text" name="id_produto" value="<?=$row['id_produto']?>">

    <label for="valor">valor: </label>
    <input type="text" name="valor" value="<?=$row['valor']?>">

    <label for="data">data: </label>
    <input type="text" name="data" value="<?=$row['data']?>">

    <label for="quantidade">quantidade: </label>
    <input type="text" name="quantidade" value="<?=$row['quantidade']?>">

    <input type="submit" value="Enviar" id="btn"/>

</form>