<?php $connection = new PDO("mysql:host=localhost;dbname=chupeta", "root", ""); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/main.css">
    <title>Loja de Chupeta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Loja de Chupeta</h1>
    <h4>Página administrativa da Chupetinhas</h4>

    <nav>
        <a href="../index.php">Home</a>
        <a href="#">Produtos</a>
        <a href="../crud_usuario/index.php">Clientes</a>
        <a href="../crud_venda/index.php">Vendas</a>
        <a href="../logout.php">Sair</a>
    </nav>

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
        <input id="btn" type="submit" value="Enviar"/>
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
                            <td class='alinhar'>"."<button class='btns' type='submit' name='id_produto' value='".$row['id_produto']."'>Editar</button>"."</td>
                        </form>

                        <form action='deletar.php' method='POST'>
                            <td class='alinhar'>"."<button class='btns' type='submit' name='delete' value='".$row['id_produto']."'>Deletar</button>"."</td>
                        </form>
                    </tr>";
                }
            ?>
        </table>
    </div>
    
</body>
</html>