<?php

namespace App\Controllers;

class EquipmentController
{
    public function getEquipment()
    {
        //Querys de base de datos

        //Vista a la que se quiere acceder
        return render('../views/equipment.php'); //Como el arreglo del 2do parámetro, puedo enviar variable con query.
    }

    public function getNewequipment()
    {
        //Querys de base de datos

        //Vista a la que se quiere acceder
        return render('../views/new-equipment.php'); //Como el arreglo del 2do parámetro, puedo enviar variable con query.
    }
}
