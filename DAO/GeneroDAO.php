<?php

class GeneroDAO
{
    private $conexao;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost:3306;dbname=movielist';

        $this->conexao = new PDO($dsn, 'root', '');
    }

    public function select()
    {
        $sql = 'SELECT * FROM generos';

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, 'GeneroModel');
    }
}
