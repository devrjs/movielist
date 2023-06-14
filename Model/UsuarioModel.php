<?php

class UsuarioModel {

    private $username;
    private $password;
    public $data = [];
  
    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function signIn(string $username, string $password){
        include 'DAO/UsuarioDAO.php';

        $dao = new UsuarioDAO();

        $this->data = $dao->selectByUsername($username, $password);
    }
}