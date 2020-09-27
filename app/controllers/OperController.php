<?php

namespace App\Controllers;

class OperController
{
    public function getOperador()
    {
        if (isset($_SESSION['userID'])) { //Si ya existe una sesión
            if ($_SESSION['rol'] == 2) { //Si el rol corresponde al operador.
                return render('../views/operator.php', ['user' => $_SESSION['user']]);
            }
        }
        
        header('Location:' . BASE_URL . 'login'); //Redireccionar a la página de login en caso de no tener una sesión activa o ser un usuario que no corresponde al operador.
    }
}
