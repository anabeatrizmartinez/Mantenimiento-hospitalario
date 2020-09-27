<?php

namespace App\Controllers;

class TecController
{
    public function getTecnico()
    {
        if (isset($_SESSION['userID'])) { //Si ya existe una sesión
            if ($_SESSION['rol'] == 3) { //Si el rol corresponde al tecnico.
                return render('../views/tecnico.php', ['user' => $_SESSION['user']]);
            }
        }

        header('Location:' . BASE_URL . 'login'); //Redireccionar a la página de login en caso de no tener una sesión activa o ser un usuario que no corresponde al tecnico.
    }
}
