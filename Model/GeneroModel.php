<?php

class GeneroModel
{
    private $id;
    private $nome;
    public $data = [];

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getAllGeneros()
    {
        include 'DAO/GeneroDAO.php';

        $dao = new GeneroDAO();

        $this->data = $dao->select();
    }
}
