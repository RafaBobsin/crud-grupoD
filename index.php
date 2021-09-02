<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chupetinha</title>
</head>
<body>
    <?php require_once 'crud.php' ?>

    <h1>Chupetinhas</h1>
    <h3>Página administrativa das Chupetinhas</h3>
    <h2>Adicionar chupeta:</h2>
    <form action="crud.php" method="POST">
        <label>Marca: </label>
        <input type="text" name="marca" value="<?php echo $marca; ?>" placeholder="Insira o nome da marca">
        <label>Tamanho: </label>
        <input type="text" name="tamanho" value="<?php echo $tamanho; ?>" placeholder="Insira o tamanho">
        <label>Cor: </label>
        <input type="text" name="cor" value="<?php echo $cor; ?>" placeholder="Insira a cor">
        <label>Estampa: </label>
        <input type="text" name="estampa" value="<?php echo $estampa; ?>" placeholder="Insira a estampa">
        <label>Material: </label>
        <input type="text" name="material" value="<?php echo $material; ?>" placeholder="Insira o material">
        <label>Valor: </label>
        <input type="text" name="valor" value="<?php echo $valor; ?>" placeholder="Insira o valor">
        
        <button type="submit" name="adicionar">Adicionar</button>
    </form>

    <br><br>

    <?php
        $connection = new mysqli('localhost', 'root', '', 'chupeta');
        $result = $connection->query("SELECT * FROM produto");
    ?>

    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Tamanho</th>
                    <th>Cor</th>
                    <th>Estampa</th>
                    <th>Material</th>
                    <th>Valor</th>
                    <th colspan="2">Ação</th>
                </tr>
            </thead>

            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id_produto'] ?></td>
                    <td><?php echo $row['marca'] ?></td>
                    <td><?php echo $row['tamanho'] ?></td>
                    <td><?php echo $row['cor'] ?></td>
                    <td><?php echo $row['estampa'] ?></td>
                    <td><?php echo $row['material'] ?></td>
                    <td><?php echo $row['valor'] ?></td>
                    <td>
                        <a href="index.php?selecionar=<?php echo $row['id_produto']; ?>">Alterar</a>
                        <a href="crud.php?deletar=<?php echo $row['id_produto']; ?>">Deletar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            
        </table>
    </div>

    <?php
        function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
    ?>

</body>
</html>

<style>
    table, th, td { border:1px solid black; }
</style>