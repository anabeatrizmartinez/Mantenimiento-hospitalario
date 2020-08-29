<?php

namespace App\Controllers;

class ReportController
{
    public function getReport()
    {
        //Querys de base de datos

        //Vista a la que se quiere acceder
        return render('../views/report.php'); //Como el arreglo del 2do parámetro, puedo enviar variable con query.
    }
}
