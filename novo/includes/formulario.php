<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="post">

        <div class="form-group">
        <label>Marca</label>
        <input type="text" class="form-control" name="marca" value="<?=$obChupeta->marca?>">
        </div>

        <div class="form-group">
        <label>Tamanho</label>
        <input type="text" class="form-control" name="tamanho" value="<?=$obChupeta->tamanho?>">
        </div>

        <div class="form-group">
        <label>Cor</label>
        <input type="text" class="form-control" name="cor" value="<?=$obChupeta->cor?>">
        </div>

        <div class="form-group">
        <label>Estampa</label>
        <input type="text" class="form-control" name="estampa" value="<?=$obChupeta->estampa?>">
        </div>

        <div class="form-group">
        <label>Material</label>
        <input type="text" class="form-control" name="material" value="<?=$obChupeta->material?>">
        </div>

        <div class="form-group">
        <label>Valor</label>
        <input type="text" class="form-control" name="valor" value="<?=$obChupeta->valor?>">
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-success">Enviar</button>
        </div>

    </form>

</main>