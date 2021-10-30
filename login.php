<?php
session_start();

if (!isset($_POST['usuario'], $_POST['senha']))
{
    die('Formulário incompleto<br>
    <a href="formulario.php">Voltar</a>');
}

$usuarioValido = 'user';
$senhaValida = '123';

if($usuarioValido == $_POST['usuario'])
{
    if($senhaValida == $_POST['senha'])
    {
        // SALVAR NA SESSAO
        $_SESSION['usuario'] = $_POST['usuario'];
        header('location: index.php');
        exit;
    }
    else
    {
        die('Senha incorreta!<br>
        <a href="formulario.php">Voltar</a>');
    }
}
else
{
    die("Usuário incorreto!<br>
    <a href='formulario.php'>Voltar</a>");
}


