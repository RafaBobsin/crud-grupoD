<?php

    $connection = new PDO("mysql:host=localhost;dbname=chupeta", "root", "");

    $sql = "SELECT * FROM produto";
    $statement = $connection->prepare($sql);
    $statement->execute();

    echo "<h1>Loja de CHUTETA</h1>";
    
    echo "<form>
    <h3>Adicionar novo produto tchuplei tchuplow<h3>
    <label>ID: <input></input></label>
    </form><br><br>";

    echo "<table><tr><th>ID</th><th>Marca</th><th>Tamanho</th><th>Cor</th><th>Estampa</th><th>Material</th><th>Valor</th><th>Editar</th><th>Deletar</th></tr></table>";
    while($row = $statement->fetch())
    {
        // id, marca, tamanho, cor, estampa, material, valor
        
        echo "<table><tr><td id='prod'>".$row['id_produto'].
        "</td><td id='marca'>".$row['marca'].
        "</td><td id='tamanho'>".$row['tamanho'].
        "</td><td id='cor'>".$row['cor'].
        "</td><td id='estampa'>".$row['estampa'].
        "</td><td id='material'>".$row['material'].
        "</td><td id='valor'>".$row['valor'].
        "</td><td id='botao1'><button></button>".
        "</td><td id='botao2'><button></button>".
        "</td></tr></table>";
    }

?>

<style>
table, th, td {
    border:1px solid black;
}

table{
    width: 80vw;
}

th{
    width: 30vw;
}

#prod{
    width: 6.5vw;
}

#marca, #botao2{
    width: 8.5vw;
}

#tamanho, #material{
    width: 9.2vw;
}

#estampa{
    width: 9.3vw;
}

#cor{
    width: 7.2vw;
}

#valor{
    width: 7.8vw;
}

#botao1{
    width: 8.2vw;
}

</style>