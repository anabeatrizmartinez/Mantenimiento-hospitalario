<?php

namespace App\Controllers;

class AdminController
{
    public function getAdministrador()
    {
        if (isset($_SESSION['userID'])) { //Si ya existe una sesión
            if ($_SESSION['rol'] == 1) { //Si el rol corresponde al administrador.
                return render('../views/admin.php', ['user' => $_SESSION['user']]);
            }
        }

        header('Location:' . BASE_URL . 'login');//Redireccionar a la página de login en caso de no tener una sesión activa o ser un usuario que no corresponde al administrador.
    }
}
