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
                        <td>"."<button>Editar</button>"."</td>
                        <td>"."<button>Deletar</button>"."</td>
                    </tr>";
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

    #prod{ width: 6.5vw; }

    #marca, #botao2{ width: 8.5vw; }

    #tamanho, #material{ width: 9.2vw; }

    #estampa{ width: 9.3vw; }

    #cor{ width: 7.2vw; }

    #valor{ width: 7.8vw; }

    #botao1{ width: 8.2vw; }
</style>