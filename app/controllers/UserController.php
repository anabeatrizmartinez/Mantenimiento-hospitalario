<?php

namespace App\Controllers;

class UserController
{
    public function getLogin()
    {
        //Querys de base de datos

        //Vista a la que se quiere acceder
        return render('../views/login.php'); //Como el arreglo del 2do parámetro, puedo enviar variable con query.
    }

    public function getRegister()
    {
        //Querys de base de datos

        //Vista a la que se quiere acceder
        return render('../views/register.php'); //Como el arreglo del 2do parámetro, puedo enviar variable con query.
    }
}
