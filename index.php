<?php

include 'Controller/FilmeController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base_path = dirname($_SERVER['SCRIPT_NAME']);

$url = str_replace($base_path, '', $url);

include 'View/layouts/header.php';

switch ($url) {
    case '/':
        FilmeController::index();

        break;

    case '/filmes':
        FilmeController::listarFilmes();

        break;

    case '/adicionar-filme':
        FilmeController::adicionarFilme();

        break;

    case '/adicionar-filme/save':
        FilmeController::salvarFilme();

        break;

    case '/editar-filme':
        FilmeController::editarFilme();

        break;

    case '/editar-filme/save':
        FilmeController::salvarFilme();

        break;

    case '/editar-filme/assistido':
        FilmeController::marcarAssistidoFilme();

        break;

    case '/excluir-filme':
        FilmeController::excluirFilme();

        break;

    default:
        echo 'Error 404';

        break;
}

include 'View/layouts/footer.php';
