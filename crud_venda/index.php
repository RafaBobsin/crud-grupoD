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
        <a href="../crud_produto/index.php">Produtos</a>
        <a href="../crud_usuario/index.php">Clientes</a>
        <a href="#">Vendas</a>
        <a href="../logout.php">Sair</a>
    </nav>

    <h2>Adicionar Venda</h2>
    <form action="adicionar.php" method="post">
        <label for="id_cliente">ID cliente: </label>
        <input type="text" name="id_cliente" >
        <label for="id_produto">ID produto: </label>
        <input type="text" name="id_produto" >
        <label for="valor">Valor: </label>
        <input type="text" name="valor" >
        <label for="data">Data: </label>
        <input type="text" name="data">
        <label for="quantidade">Quantidade: </label>
        <input type="text" name="quantidade">
        <input id="btn" type="submit" value="Enviar"/>
    </form>

    <br>

    <div class="tabela">
        <table>
            <?php 
                $sql = "SELECT * FROM venda";
                $statement = $connection->prepare($sql);
                $statement->execute();
                
                echo
                "<tr>
                    <th>ID</th>
                    <th>ID CLIENTE</th>
                    <th>ID PRODUTO</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Quantidade</th>
                    <th colspan='2'>Ação</th>
                </tr>";
                while($row = $statement->fetch()) {
                    echo
                    "<tr>
                        <td>".$row['id_venda']."</td>
                        <td>".$row['id_cliente']."</td>
                        <td>".$row['id_produto']."</td>
                        <td>".$row['valor']."</td>
                        <td>".$row['data']."</td>
                        <td>".$row['quantidade']."</td>

                        <form action='alterar.php' method='POST'>
                            <td class='alinhar'>"."<button class='btns' type='submit' name='id_venda' value='".$row['id_venda']."'>Editar</button>"."</td>
                        </form>

                        <form action='deletar.php' method='POST'>
                            <td class='alinhar'>"."<button class='btns' type='submit' name='delete' value='".$row['id_venda']."'>Deletar</button>"."</td>
                        </form>
                    </tr>";
                }
            ?>
        </table>
    </div>
    
</body>
</html>