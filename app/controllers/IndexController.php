<?php

namespace App\Controllers; //Este modelo de controladores es manejado por el mismo phroute, y con el autoload de PSR-4 establecido en composer.json

class IndexController
{
    public function getIndex()
    {
        //Vista a la que se quiere acceder
        return render('../views/index.php');
    }
}
