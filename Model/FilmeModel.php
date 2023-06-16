<?php

class FilmeModel
{
    private $id;
    private $titulo;
    private $generoId;
    private $anoLancamento;
    private $poster;
    private $trailer;
    private $assistido;
    private $dataCadastro;
    public $data = [];

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getGeneroId()
    {
        return $this->generoId;
    }

    public function setGeneroId($generoId)
    {
        $this->generoId = $generoId;
    }

    public function getAnoLancamento()
    {
        return $this->anoLancamento;
    }

    public function setAnoLancamento($anoLancamento)
    {
        $this->anoLancamento = $anoLancamento;
    }

    public function getPoster()
    {
        return $this->poster;
    }

    public function setPoster($poster)
    {
        $this->poster = $poster;
    }

    public function getTrailer()
    {
        return $this->trailer;
    }

    public function setTrailer($trailer)
    {
        $this->trailer = $trailer;
    }

    public function getAssistido()
    {
        return $this->assistido;
    }

    public function setAssistido($assistido)
    {
        $this->assistido = $assistido;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }

    public function getAllFilmes()
    {
        include 'DAO/FilmeDAO.php';

        $dao = new FilmeDAO();

        $this->data = $dao->select();
    }

    public function getFilmesNaoAssisidos()
    {
        include 'DAO/FilmeDAO.php';

        $dao = new FilmeDAO();

        $meusFilmes = array();

        foreach ($dao->selectByMeusFilmes() as $meuFilme) {
            foreach ($dao->select() as $filme) {
                if ($filme->id == $meuFilme->filmes_id and $meuFilme->assistido = 0) {
                    $meusFilmes[] = $filme;
                    break;
                }
            }
        }

        $this->data = $meusFilmes;
    }

    public function getMeusFilmes()
    {
        include 'DAO/FilmeDAO.php';

        $dao = new FilmeDAO();

        $meusFilmes = array();

        foreach ($dao->selectByMeusFilmes() as $meuFilme) {
            foreach ($dao->select() as $filme) {
                if ($filme->id == $meuFilme->filmes_id) {
                    $meusFilmes[] = $filme;
                    break;
                }
            }
        }

        $this->data = $meusFilmes;
    }

    public function setMeusFilmes($id)
    {
        include 'DAO/FilmeDAO.php';

        $dao = new FilmeDAO();

        $dao->insertMeusFilmes($id);
    }

    public function save()
    {
        include 'DAO/FilmeDAO.php';

        $dao = new FilmeDAO();

        $dao->insert($this);
    }

    public function update($id)
    {
        include 'DAO/FilmeDAO.php';

        $dao = new FilmeDAO();

        $dao->update($this, $id);
    }

    public function buscarFilme(int $id)
    {
        include 'DAO/FilmeDAO.php';

        $dao = new FilmeDAO();

        $this->data = $dao->selectById($id);
    }

    public function marcarComoAssistido(int $id)
    {
        include 'DAO/FilmeDAO.php';

        $dao = new FilmeDAO();

        $this->data = $dao->updateParaAssistido($id);
    }

    public function excluirFilme(int $id)
    {
        include 'DAO/FilmeDAO.php';

        $dao = new FilmeDAO();

        $this->data = $dao->delete($id);
    }
}
