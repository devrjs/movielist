<?php

class UsuarioModel {

    private $conexao;
    private $id;
    private $nome_completo;
    private $email;
    private $password;
  
    public function __construct($conexao) {
      $this->conexao = $conexao;
    }
  
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNomeCompleto()
    {
        return $this->nome_completo;
    }

    public function setNomeCompleto($nome_completo)
    {
        $this->nome = $nome_completo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    
      /*
      public function insertUser($nome_completo, $email, $password) {
        $query = "INSERT INTO usuarios (nome_completo, email, password) VALUES (:nome_completo, :email, :password)";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':nome_completo', $nome_completo);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $this->conexao->lastInsertId();
      }
      */

    }