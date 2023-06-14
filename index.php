<?php

include 'Controller/FilmeController.php';
include 'Controller/UsuarioController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base_path = dirname($_SERVER['SCRIPT_NAME']);

$url = str_replace($base_path, '', $url);

if(!isset($_SESSION)){
    session_start();
}

include 'View/layouts/header.php';

switch ($url) {
    case '/':
        if(isset($_SESSION['username'])){
            header('Location: ./filmes');
            exit();
        }

        include 'View/modules/loginUsuario.php';

        break;

    case '/signin':
        if(isset($_SESSION['username'])){
            header('Location: ./filmes');
            exit();
        }

        UsuarioController::signIn();

        break;

    // Redireciona para pagina inicial se nao houver sessao
    case !isset($_SESSION['username']):
        header('Location: ./');
        break;
    //===================

    case '/nao-assistidos':
        FilmeController::naoAssistido();

        break;
   
    case '/meus-filmes':
        FilmeController::meusFilmes();
        
        break;

    case '/addmeu-filme':
        FilmeController::addMeuFilme();

        break;
            
    case '/filmes':
        FilmeController::listarFilmes();

        break;

    case '/filme':
        FilmeController::visualizarFilme();

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

include 'View/layouts/endBody.php';
