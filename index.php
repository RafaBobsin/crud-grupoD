<?php
session_start();

if (!isset($_SESSION['usuario']))
{
    header('location: formulario.php');
    exit;
}

?>

<?php $connection = new PDO("mysql:host=localhost;dbname=chupeta", "root", ""); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <title>Loja de Chupeta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Loja de Chupeta</h1>
    <h4>Página administrativa da Chupetinhas</h4>
    
    <nav>
        <a href="#">Home</a>
        <a href="crud_produto/index.php">Produtos</a>
        <a href="crud_usuario/index.php">Clientes</a>
        <a href="crud_venda/index.php">Vendas</a>
        <a href="logout.php">Sair</a>
    </nav>

    <h2>Página inicial</h2>
    <div class="inicio">
        <p>Bem-vindo à página inicial das Chupetinhas, abaixo você poderá visualizar todas as informações sobre os produtos, clientes e vendas :D</p>
        <p>
            Grupo: Júlia Martins, Maitê Nascimento, Mell Matsuda e Rafaela Bobsin<br>
            401 INFO
        </p>
    </div>

    
</body>
</html>