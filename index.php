<?php 
    $connection = new PDO("mysql:host=localhost;dbname=chupeta", "root", "");

    if(isset($_GET['update'])){
        $id = $_GET['update'];
        $rec = mysqli_query($connection, "SELECT * FROM chupeta WHERE id_produto=$id");
        $record = mysqli_fetch_array($rec);
        $marca = $record['marca'];
        $tamanho = $record['tamanho'];
        $cor = $record['cor'];
        $estampa = $record['estampa'];
        $material = $record['material'];
        $valor = $record['valor'];
        
    }

    $update = false;
    $marca = '';
    $tamanho = '';
    $cor = '';
    $estampa = '';
    $material = '';
    $valor = '';
?>
<?php
    if(isset($_POST['delete'])){
        header('Refresh: 0.1; url=index.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Chupeta</title>
</head>
<body>
    <?php require_once 'process.php' ?>
    <h1>Loja de Chupeta</h1>
    <h4>Página administrativa da Chupetinhas</h4>

    <h2>Adicionar chupeta</h2>
    <form method="POST">
        <label for="marca">Marca: </label>
        <input type="text" name="marca" required value="<?php echo $marca ?>">
        <label for="tamanho">Tamanho: </label>
        <input type="text" name="tamanho" value="<?php echo $tamanho ?>">
        <label for="cor">Cor: </label>
        <input type="text" name="cor" value="<?php echo $cor ?>">
        <label for="estampa">Estampa: </label>
        <input type="text" name="estampa" value="<?php echo $estampa ?>">
        <label for="material">Material: </label>
        <input type="text" name="material" required value="<?php echo $material ?>">
        <label for="valor">Valor: </label>
        <input type="text" name="valor" required value="<?php echo $valor ?>">
        <?php if($update == false): ?>
            <input type="submit" value="Enviar"/>
        <?php else: ?>
            <input type="submit" value="Atualizar"/>
        <?php endif ?>
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
                        <form method='GET'>
                            <td>"."<button type='submit' name='update' value='".$row['id_produto']."'>Editar</button>"."</td>
                            <td>"."<button type='submit' name='delete' value='".$row['id_produto']."'>Deletar</button>"."</td>
                        </form>
                    </tr>";
                }
            ?>
            <?php
                if(isset($_POST['delete'])){
                    $id = $_POST['delete'];
                    $sql = "DELETE FROM `produto` WHERE `id_produto` = '{$id}'";

                    $result = $connection->query($sql);
                }
            ?>
        </table>
    </div>
    
</body>
</html>

<style>
    table, th, td { border:1px solid black; }

    table{ width: 90vw; }

    th{ width: 40vw; }
</style>