<link rel="stylesheet" type="text/css" href="../styles/main.css">
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
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
    
    
        $sql = "UPDATE `cliente` SET `nome` = '$nome', `cpf` = '$cpf', `telefone` = '$telefone' WHERE `cliente`.`id_cliente` = $id";

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
    
    if(isset($_POST['id_cliente'])){
        $id = $_POST['id_cliente'];
        $sql = "SELECT * FROM cliente WHERE id_cliente=$id";
        
        $stnt = $connection->prepare($sql);
        $stnt -> execute();

        if($stnt -> rowCount() == 1){
            $row = $stnt->fetch();
        }
    }
    
?>

<h2 id="tituloEdit">Editar cliente</h2>
<form action="alterar.php" method="post">

    <label for="marca">ID: </label>
    <input type="text" name="id" readonly value="<?=$row['id_cliente']?>">

    <label for="nome">Nome: </label>
    <input type="text" name="nome" required value="<?=$row['nome']?>">

    <label for="cpf">CPF: </label>
    <input type="text" name="cpf" value="<?=$row['cpf']?>">

    <label for="telefone">Telefone: </label>
    <input type="text" name="telefone" value="<?=$row['telefone']?>">

    <input type="submit" value="Enviar" id="btn"/>

</form>