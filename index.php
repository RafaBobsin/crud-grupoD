<?php $connection = new PDO("mysql:host=localhost;dbname=chupeta", "root", ""); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Chupeta</title>
</head>
<body>
    <h1>Loja de Chupeta</h1>
    <h4>Página administrativa da Chupetinhas</h4>

    <h2>Adicionar chupeta</h2>
    <form action="index.php" method="post">
        <label for="marca">Marca: </label>
        <input type="text" name="marca">
        <label for="tamanho">Tamanho: </label>
        <input type="text" name="tamanho">
        <label for="cor">Cor: </label>
        <input type="text" name="cor">
        <label for="estampa">Estampa: </label>
        <input type="text" name="estampa">
        <label for="material">Material: </label>
        <input type="text" name="material">
        <label for="valor">Valor: </label>
        <input type="text" name="valor">
        <input type="submit" value="Enviar"/>
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
            } else {
                echo "";
            }
        ?>
    </form>

    <br>

    <div class="tabela">
        <table>
            <?php 
                $sql = "SELECT * FROM produto";
                $statement = $connection->prepare($sql);
                $statement->execute();
                
                echo
                "<tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Tamanho</th>
                    <th>Cor</th>
                    <th>Estampa</th>
                    <th>Material</th>
                    <th>Valor</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>";
                while($row = $statement->fetch()) {
                    echo
                    "<tr>
                        <td>".$row['id_produto']."</td>
                        <td>".$row['marca']."</td>
                        <td>".$row['tamanho']."</td>
                        <td>".$row['cor']."</td>
                        <td>".$row['estampa']."</td>
                        <td>".$row['material']."</td>
                        <td>".$row['valor']."</td>
                        <td>"."<a href='index.php?update=".$row['id_produto']."'>Editar</a>"."</td>
                        <td>"."<a href='index.php?delete=".$row['id_produto']."'>Deletar</a>"."</td>
                    </tr>";
                }
            ?>
            <?php
                if(isset($_GET['id_produto'])){
                    $id = $_GET['id_produto'];
                    $sql = "DELETE FROM `produto` WHERE `id_produto`='$id'";

                    $result = $connection->query($sql);
                }
            ?>
            <?php
                if(isset($_POST['update'])){
                    $marca = $_POST['marca'];
                    $tamanho = $_POST['tamanho'];
                    $cor = $_POST['cor'];
                    $estampa = $_POST['estampa'];
                    $material = $_POST['material'];
                    $valor = $_POST['valor'];

                    $sql = "UPDATE 'produto' SET 'marca' = '$marca', 'tamanho' = '$tamanho', 'cor' = '$cor', 'estampa' = '$estampa', 'material' = '$material', 'valor' = '$valor', ";

                    $result = $connection->query($sql);

                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $marca = $row['marca'];
                            $tamanho = $row['tamanho'];
                            $cor = $row['cor'];
                            $estampa = $row['estampa'];
                            $material = $row['material'];
                            $valor = $row['valor'];
                        }
                    }
                }
            ?>
        </table>
    </div>
    
</body>
</html>

<style>
    table, th, td { border:1px solid black; }

    table{ width: 80vw; }

    th{ width: 30vw; }
</style>