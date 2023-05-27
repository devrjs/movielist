<div class="container my-5">
    <h1>Adicionar Filme</h1>
    <form method="POST" enctype="multipart/form-data" action="./adicionar-filme/save">
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="genero_id">Gênero:</label>
            <select class="form-control" id="genero_id" name="genero_id" required>
                <?php
                foreach ($generos->data as $genero) {
                    echo '<option value="' . $genero->getId() . '">' . $genero->getNome() . '</option>';
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="ano_lancamento">Ano de lançamento:</label>
            <input type="number" class="form-control" id="ano_lancamento" name="ano_lancamento">
        </div>
        <div class="form-group">
            <label for="poster" class="form-label">Poster:</label>
            <input type="file" class="form-control" id="poster" name="poster" required />
            </div>
        <div class="form-group">
            <label for="trailer">Trailer:</label>
            <input type="text" class="form-control" id="trailer" name="trailer">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="assistido" name="assistido">
            <label class="form-check-label" for="assistido">Assistido</label>
        </div>
        <button type="submit" class="btn btn-primary" name="submit-filme">Adicionar filme</button>
    </form>
</div>