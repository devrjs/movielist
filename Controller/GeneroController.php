<?php

class GeneroController
{
    public static function listarGeneros()
    {
        include 'Model/GeneroModel.php';

        $generos = new GeneroModel();
        $generos->getAllGeneros();
    }
}
