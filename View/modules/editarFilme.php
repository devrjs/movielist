<div class="container my-5">
  <h1>Editar Filme</h1>
  <form method="POST" enctype="multipart/form-data" action="./editar-filme/save?id=<?php echo $filme->getId(); ?>">
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required value="<?php echo $filme->getTitulo(); ?>">
        </div>
        <div class="form-group">
            <label for="genero_id">Gênero:</label>
            <select class="form-control" id="genero_id" name="genero_id" required>
            <?php foreach($generos->data as $genero): ?>
                <option value="<?php echo $genero->getId(); ?>" <?php if($genero->getId() == $filme->getGeneroId()) {
                    echo 'selected';
                } ?>><?php echo $genero->getNome(); ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="ano_lancamento">Ano de lançamento:</label>
            <input type="number
            " class="form-control" id="ano_lancamento" name="ano_lancamento" required value="<?php echo $filme->getAnoLancamento(); ?>">
        </div>
        <div class="form-group">
            <label for="poster">Poster:</label>
            <input type="file" class="form-control" id="poster" name="poster" required />
        </div>
        <div class="form-group">
            <label for="trailer">Trailer:</label>
            <input type="text" class="form-control" id="trailer" name="trailer" required value="<?php echo $filme->getTrailer(); ?>">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="assistido" name="assistido" <?php if($filme->getAssistido()) {
                echo 'checked';
            } ?>>
            <label class="form-check-label" for="assistido">Assistido</label>
        </div>
        <button type="submit" class="btn btn-primary" name="submit-filme">Salvar</button>
    </form>
</div>