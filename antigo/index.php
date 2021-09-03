<?php $connection = new PDO("mysql:host=localhost;dbname=chupeta", "root", ""); ?>

<!DOCTYPE html>
<html lang="pt-br">
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
    <form action="adicionar.php" method="post">
        <label for="marca">Marca: </label>
        <input type="text" name="marca" required>
        <label for="tamanho">Tamanho: </label>
        <input type="text" name="tamanho">
        <label for="cor">Cor: </label>
        <input type="text" name="cor">
        <label for="estampa">Estampa: </label>
        <input type="text" name="estampa">
        <label for="material">Material: </label>
        <input type="text" name="material">
        <label for="valor">Valor: </label>
        <input type="text" name="valor" required>
        <input type="submit" value="Enviar"/>
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
                    <th colspan='2'>Ação</th>
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
                        <form action='alterar.php' method='POST'>
                            <td>"."<button type='submit' name='update' value='".$row['id_produto']."'>Editar</button>"."</td>
                        </form>
                        <form action='deletar.php' method='POST'>
                            <td>"."<button type='submit' name='delete' value='".$row['id_produto']."'>Deletar</button>"."</td>
                        </form>
                    </tr>";
                }
            ?>
        </table>
    </div>
    
</body>
</html>

<style>
    table, th, td { border:1px solid black; }

    table{ width: 70vw; }

    th{ width: 40vw; }
</style>