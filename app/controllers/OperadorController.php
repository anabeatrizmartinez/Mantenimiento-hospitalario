<?php

namespace App\Controllers;

class OperadorController
{
    public function getOperador()
    {
        //Querys de base de datos
    
        //Vista a la que se quiere acceder
        return render('../views/operator.php'); //Como el arreglo del 2do parámetro, puedo enviar variable con query.
    }
}
