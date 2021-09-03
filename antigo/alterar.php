<?php
    $connection = new PDO("mysql:host=localhost;dbname=chupeta", "root", "");

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
    
    if(isset($_POST['update'])){
        $id = $_POST['id_produto'];
        $result = "SELECT * FROM produto WHERE id_produto=$id";
        
        if(count($result)==1){
            $row = $result;
        }
    }
    
?>

<h2>Editar chupeta</h2>
<form action="index.php" method="post">
    <label for="marca">ID: </label>
    <input type="text" name="id" readonly>
    <label for="marca">Marca: </label>
    <input type="text" name="marca" required>
    <label for="tamanho">Tamanho: </label>
    <input type="text" name="tamanho">
    <label for="cor">Cor: </label>
    <input type="text" name="cor"><br>
    <label for="estampa">Estampa: </label>
    <input type="text" name="estampa">
    <label for="material">Material: </label>
    <input type="text" name="material">
    <label for="valor">Valor: </label>
    <input type="text" name="valor" required>
    <input type="submit" value="Enviar"/>
</form>