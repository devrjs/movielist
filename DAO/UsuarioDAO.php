<?php

class UsuarioDAO
{
    private $conexao;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost:3306;dbname=movielist';

        $this->conexao = new PDO($dsn, 'root', '');
    }



    public function checkEmailExists($email) {
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
      }

    
      public function insertUser($nome_completo, $email, $password) {
        $query = "INSERT INTO usuarios (nome_completo, email, password) VALUES (:nome_completo, :email, :password)";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':nome_completo', $nome_completo);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $this->conexao->lastInsertId();
      }


      /*
      public function insertUser(UsuarioModel $usuario)
      {
          $sql = 'INSERT INTO usuarios (nome_completo, email, password) VALUES (?, ?, ?)';
          $stmt = $this->conexao->prepare($sql);
  
          $stmt->bindValue(1, $usuario->getNomeCompleto());
          $stmt->bindValue(2, $usuario->getEmail());
          $stmt->bindValue(3, $usuario->getPassword());
  
          $stmt->execute();
      }
      */


      public function getUserByEmail($email) {
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
      }

      public function updatePassword($usuarioId, $newPassword) {
        $query = "UPDATE usuarios SET password = :password WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':password', $newPassword);
        $stmt->bindParam(':id', $usuarioId);
        $stmt->execute();
        return $stmt->rowCount();
      }

}
