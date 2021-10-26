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

    <a href="../index.php">Home</a>
    <a href="../crud_produto/index.php">Produtos</a>
    <a href="#">Usuários</a>
    <a href="../crud_venda/index.php">Vendas</a>
    <a href="../login.php">Sair</a>

    <h2>Adicionar cliente</h2>
    <form action="adicionar.php" method="post">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" required>
        <label for="cpf">Cpf: </label>
        <input type="text" name="cpf" required>
        <label for="telefone">Telefone: </label>
        <input type="text" name="telefone">
        <input id="btn" type="submit" value="Enviar"/>
    </form>

    <br>

    <div class="tabela">
        <table>
            <?php 
                $sql = "SELECT * FROM cliente";
                $statement = $connection->prepare($sql);
                $statement->execute();
                
                echo
                "<tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th colspan='2'>Ação</th>
                </tr>";
                while($row = $statement->fetch()) {
                    echo
                    "<tr>
                        <td>".$row['id_cliente']."</td>
                        <td>".$row['nome']."</td>
                        <td>".$row['cpf']."</td>
                        <td>".$row['telefone']."</td>

                        <form action='alterar.php' method='POST'>
                            <td class='alinhar'>"."<button class='btns' type='submit' name='id_cliente' value='".$row['id_cliente']."'>Editar</button>"."</td>
                        </form>

                        <form action='deletar.php' method='POST'>
                            <td class='alinhar'>"."<button class='btns' type='submit' name='delete' value='".$row['id_cliente']."'>Deletar</button>"."</td>
                        </form>
                    </tr>";
                }
            ?>
        </table>
    </div>
    
</body>
</html>