<div class="container my-5">
  <h1>Detalhes do Filme</h1>
  <div class="card">
  <div class="card-body">
    <h5 class="card-title"><?php echo $filme->getTitulo(); ?></h5>
    <div class="row">
      <div class="col-md-4">
        <img src="<?= $filme->getPoster() ?>" alt="<?= $filme->getTitulo() ?>" class="img-fluid">
      </div>
      <div class="col-md-8">
        <p class="card-text"><strong>Gênero:</strong>
          <?php foreach($generos->data as $genero): ?>
            <?php if($genero->getId() == $filme->getGeneroId()): ?>
              <?php echo $genero->getNome(); ?>
            <?php endif; ?>
          <?php endforeach; ?>
        </p>
        <p class="card-text"><strong>Ano de Lançamento:</strong> <?php echo $filme->getAnoLancamento(); ?></p>
        <p class="card-text"><strong>Trailer:</strong> <a href="<?php echo $filme->getTrailer(); ?>" target="_blank" rel="noopener noreferrer"><?php echo $filme->getTrailer(); ?></a></p>
        <p class="card-text"><strong>Assistido:</strong> <?php echo $filme->getAssistido() ? 'Sim' : 'Não'; ?></p>
      </div>
    </div>
  </div>
</div>

  <!-- Campo para exibir e criar comentários -->
  <div class="mt-4">
    <h3>Comentários</h3>
    <!-- Exibir comentários existentes -->
    <?php foreach ($comentarios as $comentario): ?>
      <div class="card">
        <div class="card-body">
          <p class="card-text"><?php echo $comentario->getTexto(); ?></p>
          <p class="card-text">Autor: <?php echo $comentario->getAutor(); ?></p>
        </div>
      </div>
    <?php endforeach; ?>

    <!-- Formulário para criar novo comentário -->
    <form method="POST" action="./adicionar-comentario">
      <div class="form-group mt-3">
        <label for="texto">Novo Comentário:</label>
        <textarea class="form-control" id="texto" name="texto" rows="3" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Adicionar Comentário</button>
    </form>
  </div>
</div>
