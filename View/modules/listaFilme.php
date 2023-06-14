<div class="container my-5">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Lista de Filmes</h1>
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
                        <p class="card-text"><strong>Data de Cadastro:</strong> <?= $filme->getDataCadastro() ?></p>
                        <a href="filme?id=<?= $filme->getId() ?>" class="btn btn-primary">Ver mais</a>
                        <form method="POST" action="./addmeu-filme?id=<?= $filme->getId() ?>" class="d-inline">
                            <input type="hidden" name="filme-id" value="<?= $filme->getId() ?>">
                            <button type="submit" name="filme-assistido" class="btn btn btn-info">Add Minha Lista</button>
                        </form>
                        <a href="editar-filme?id=<?= $filme->getId() ?>" class="btn btn-secondary">Editar</a>
                        <form method="POST" action="./excluir-filme?id=<?= $filme->getId() ?>" class="d-inline">
                            <input type="hidden" name="filme-id" value="<?= $filme->getId() ?>">
                            <button type="submit" name="deletar-filme" class="btn btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>