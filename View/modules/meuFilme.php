<div class="container my-5">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Meus Filmes</h1>
			<hr>
		</div>
	</div>
	<div class="row">
        <?php foreach ($filmes->data as $filme): ?>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card">
                    <img class="card-img-top" src="<?= $filme->getPoster() ?>" alt="<?= $filme->getTitulo() ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $filme->getTitulo() ?></h5>
                        <p class="card-text"><strong>Gênero:</strong> 
                        <?php foreach ($generos->data as $genero): ?>
                            <?php if($genero->getId() == $filme->getGeneroId()): ?>
                                <?= $genero->getNome() ?>
                            <?php endif; ?>                            
                        <?php endforeach; ?>
                        </p>
                        <p class="card-text"><strong>Ano de Lançamento:</strong> <?= $filme->getAnoLancamento() ?></p>
                        <a href="filme?id=<?= $filme->getId() ?>" class="btn btn-primary">Ver mais</a>
                        <?php if(!$filme->getAssistido()): ?>
                            <form method="POST" action="./editar-filme/assistido?id=<?= $filme->getId() ?>" class="d-inline">
                                <input type="hidden" name="filme-id" value="<?= $filme->getId() ?>">
                                <button type="submit" name="filme-assistido" class="btn btn btn-success">Assistido</button>
                            </form>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>