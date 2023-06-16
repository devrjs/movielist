<?php

class FilmeDAO
{
    private $conexao;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost:3306;dbname=movielist';

        $this->conexao = new PDO($dsn, 'root', '');
    }

    public function insert(FilmeModel $filme)
    {
        $sql = 'INSERT INTO filmes (titulo, generoId, anoLancamento, poster, trailer, assistido)
                VALUES (?, ?, ?, ?, ?, ?)';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $filme->getTitulo());
        $stmt->bindValue(2, $filme->getGeneroId());
        $stmt->bindValue(3, $filme->getAnoLancamento());
        $stmt->bindValue(4, $filme->getPoster());
        $stmt->bindValue(5, $filme->getTrailer());
        $stmt->bindValue(6, $filme->getAssistido());

        $stmt->execute();
    }

    public function update(FilmeModel $filme, $id)
    {
        $sql = 'UPDATE filmes SET titulo = ?, generoId = ?, anoLancamento = ?,
         poster = ?, trailer = ?, assistido = ? WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $filme->getTitulo());
        $stmt->bindValue(2, $filme->getGeneroId());
        $stmt->bindValue(3, $filme->getAnoLancamento());
        $stmt->bindValue(4, $filme->getPoster());
        $stmt->bindValue(5, $filme->getTrailer());
        $stmt->bindValue(6, $filme->getAssistido());
        $stmt->bindValue(7, $id);

        $stmt->execute();
    }

    public function updateParaAssistido(int $id)
    {
        $sql = 'UPDATE filmes SET assistido = 1 WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject('FilmeModel');
    }

    public function insertMeusFilmes(int $id)
    {
        $sql = 'INSERT INTO meus_filmes (usuarios_username, filmes_id)
                VALUES (?, ?)';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $_SESSION['username']);
        $stmt->bindValue(2, $id);

        $stmt->execute();

        return $stmt->fetchObject('FilmeModel');
    }

    public function select()
    {
        $sql = 'SELECT filmes.id, filmes.titulo, generos.nome as genero, filmes.anoLancamento, filmes.poster, filmes.trailer, filmes.dataCadastro, filmes.generoId
        FROM filmes INNER JOIN generos ON filmes.generoId = generos.id ORDER BY generos.nome, filmes.anoLancamento';

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, 'FilmeModel');
    }

    public function selectByNaoAssistido()
    {
        $sql = 'SELECT id, titulo, poster, trailer FROM filmes WHERE assistido = 0';

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, 'FilmeModel');
    }

    public function selectByMeusFilmes()
    {
        $sql = 'SELECT * FROM `meus_filmes` WHERE usuarios_username = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $_SESSION['username']);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, 'FilmeModel');
    }

    public function selectById(int $id)
    {
        $sql = 'SELECT * FROM filmes WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);
        
        $stmt->execute();

        return $stmt->fetchObject('FilmeModel');
    }

    public function delete(int $id)
    {
        $sql = 'DELETE FROM filmes WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject('FilmeModel');
    }
}
