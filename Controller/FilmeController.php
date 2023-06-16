<?php

class FilmeController
{
    public static function naoAssistido()
    {
        include 'Model/FilmeModel.php';

        $filmes = new FilmeModel();
        $filmes->getFilmesNaoAssisidos();

        include 'View/layouts/navbar.php';
        include 'View/modules/naoAssistidoFilme.php';
        include 'View/layouts/footer.php';
    }

    public static function meusFilmes()
    {
        include 'Model/FilmeModel.php';
        include 'Model/GeneroModel.php';

        $filmes = new FilmeModel();
        $filmes->getMeusFilmes();

        $generos = new GeneroModel();
        $generos->getAllGeneros();

        include 'View/layouts/navbar.php';
        include 'View/modules/meuFilme.php';
        include 'View/layouts/footer.php';
    }

    public static function addMeuFilme()
    {
        include 'Model/FilmeModel.php';

        if (isset($_GET['id'])) {
            $filme = new FilmeModel();
            $filme->setMeusFilmes((int) $_GET['id']);
        } else {
            echo 'ID do filme não encontrado.';
        }
        
        header('Location: ./meus-filmes');
    }

    public static function listarFilmes()
    {
        include 'Model/FilmeModel.php';
        include 'Model/GeneroModel.php';

        $filmes = new FilmeModel();
        $filmes->getAllFilmes();

        $generos = new GeneroModel();
        $generos->getAllGeneros();

        include 'View/layouts/navbar.php';
        include 'View/modules/listaFilme.php';
        include 'View/layouts/footer.php';
    }

    public static function visualizarFilme()
    {
        include 'Model/FilmeModel.php';
        include 'Model/GeneroModel.php';

        if (isset($_GET['id'])) {
            $filme = new FilmeModel();
            $filme->buscarFilme((int) $_GET['id']);
        } else {
            echo 'ID do filme não encontrado.';
        }

        $filme = $filme->data;
        
        $generos = new GeneroModel();
        $generos->getAllGeneros();

        include 'View/layouts/navbar.php';
        include 'View/modules/visualizarFilme.php';
        include 'View/layouts/footer.php';
    }

    public static function adicionarFilme()
    {
        include 'Model/GeneroModel.php';

        $generos = new GeneroModel();
        $generos->getAllGeneros();

        include 'View/layouts/navbar.php';
        include 'View/modules/adicionarFilme.php';
        include 'View/layouts/footer.php';
    }

    public static function salvarFilme()
    {
        include 'Model/FilmeModel.php';

        $titulo = $_POST['titulo'];
        $genero_id = $_POST['genero_id'];
        $ano_lancamento = $_POST['ano_lancamento'];
        $trailer = $_POST['trailer'];
        $assistido = isset($_POST['assistido']) ? 1 : 0;
        $poster = isset($_FILES['poster']) && !empty($_FILES['poster']['name']) ? 'View/images/' . $_FILES['poster']['name'] : null;
        $temp = isset($_FILES['poster']) && !empty($_FILES['poster']['tmp_name']) ? $_FILES['poster']['tmp_name'] : null;

        if ($temp && !empty($poster)) {
            move_uploaded_file($temp, $poster);
        }

        $filme = new FilmeModel();

        $filme->setTitulo($titulo);
        $filme->setGeneroId($genero_id);
        $filme->setAnoLancamento($ano_lancamento);
        $filme->setPoster($poster);
        $filme->setTrailer($trailer);
        $filme->setAssistido($assistido);

        if (isset($_GET['id'])) {
            $filme->update((int) $_GET['id']);
        } else {
            $filme->save();
        }

        header('Location: ../filmes');
    }

    public static function editarFilme()
    {
        include 'Model/FilmeModel.php';
        include 'Model/GeneroModel.php';

        if (isset($_GET['id'])) {
            $filme = new FilmeModel();
            $filme->buscarFilme((int) $_GET['id']);
        } else {
            echo 'ID do filme não encontrado.';
        }

        $filme = $filme->data;

        $generos = new GeneroModel();
        $generos->getAllGeneros();

        include 'View/layouts/navbar.php';
        include 'View/modules/editarFilme.php';
        include 'View/layouts/footer.php';
    }

    public static function marcarAssistidoFilme()
    {
        include 'Model/FilmeModel.php';

        if (isset($_GET['id'])) {
            $filme = new FilmeModel();
            $filme->marcarComoAssistido((int) $_GET['id']);
        } else {
            echo 'ID do filme não encontrado.';
        }

        header('Location: ../filmes');
    }

    public static function excluirFilme()
    {
        include 'Model/FilmeModel.php';

        if (isset($_GET['id'])) {
            $filme = new FilmeModel();
            $filme->excluirFilme((int) $_GET['id']);
        } else {
            echo 'ID do filme não encontrado.';
        }

        header('Location: ./filmes');
    }
}
