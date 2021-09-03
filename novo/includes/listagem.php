<?php

    $mensagem = '';
    if(isset($_GET['status'])){
        switch ($_GET['status']) {
            case 'success':
                $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;

            case 'error':
                $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
            break;
        }
    }

    $resultados = '';
    foreach($chupetas as $chupeta){
        $resultados .= '<tr>
            <td>'.$chupeta->id.'</td>
            <td>'.$chupeta->marca.'</td>
            <td>'.$chupeta->tamanho.'</td>
            <td>'.$chupeta->cor.'</td>
            <td>'.$chupeta->estampa.'</td>
            <td>'.$chupeta->material.'</td>
            <td>'.$chupeta->valor.'</td>
            <td>
                <a href="editar.php?id='.$chupeta->id.'">
                    <button type="button" class="btn btn-primary">Editar</button>
                </a>
                <a href="excluir.php?id='.$chupeta->id.'">
                    <button type="button" class="btn btn-danger">Excluir</button>
                </a>
            </td>
        </tr>';
    }

    $resultados = strlen($resultados) ? $resultados : '<tr>
    <td colspan="6" class="text-center">
    Nenhuma chupeta encontrada :(
    </td>
    </tr>';

?>
<main>

    <?=$mensagem?>

    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">Nova chupeta</button>
        </a>
    </section>

    <section>

        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th></th>
                    <th>Marca</th>
                    <th>Tamanho</th>
                    <th>Cor</th>
                    <th>Estampa</th>
                    <th>Material</th>
                    <th>Valor</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
        </table>

    </section>

</main>