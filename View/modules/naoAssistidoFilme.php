<div class="container my-5">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Filmes Não Assistidos</h1>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php if (count($filmes->data) > 0): ?>
				<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
					<?php foreach ($filmes->data as $filme) : ?>
						<div class="col">
							<div class="card h-100">
								<a href="<?= $filme->getTrailer() ?>" target="_blank">
									<img src="<?= $filme->getPoster() ?>" class="card-img-top" alt="<?= $filme->getTitulo() ?>">
								</a>
								<div class="card-body">
									<h5 class="card-title"><?= $filme->getTitulo() ?></h5>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php else: ?>
				<div class="alert alert-info">Não há filmes não assistidos.</div>
			<?php endif; ?>
		</div>
	</div>
</div>