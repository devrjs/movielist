<?php

class UsuarioDAO
{
    private $conexao;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost:3306;dbname=movielist';

        $this->conexao = new PDO($dsn, 'root', '');
    }
    
    public function selectByUsername(string $username, string $password)
    {
        $sql = 'SELECT * FROM usuarios WHERE username = ? AND password = ?;';

        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $password);

        $stmt->execute();

        return $stmt->fetchObject('UsuarioModel');
    }
}
