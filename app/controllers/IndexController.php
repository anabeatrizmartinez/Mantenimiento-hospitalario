<?php

namespace App\Controllers; //Este modelo de controladores es manejado por el mismo phroute.

class IndexController
{
    public function getIndex()
    {
        //Querys de base de datos

        //Vista a la que se quiere acceder
        return render('../views/index.php'); //Como el arreglo del 2do parámetro, puedo enviar variable con query.
    }
}
