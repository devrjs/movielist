<?php

class UsuarioController
{
    public static function signIn()
    {
        include 'Model/UsuarioModel.php';

        $username = $_POST['username'];
        $password = $_POST['password'];

        $usuario = new UsuarioModel();
        $usuario->signIn($username, $password);
        
        $_SESSION['username'] = $usuario->data->getUsername();

        header('Location: ./filmes');
    }
}