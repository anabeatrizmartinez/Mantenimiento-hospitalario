<?php

namespace App\Controllers;

use PDO;

class RolController
{
    public function getRol() //Para redireccionar a las rutas según el rol del usuario.
    {
        if (isset($_SESSION['userID'])) { //Si ya existe una sesión
            global $pdo;

            $userID = $_SESSION['userID'];
            $query = $pdo->prepare('SELECT * FROM users WHERE id = :id');
            $query->execute(['id' => $userID]);
            
            $user = $query->fetch(PDO::FETCH_OBJ); //Guardo la información del usuario de la consulta.
            
            if ($user) {
                $_SESSION['rol'] = $user->rol_id; //Guardo el rol_id en una variable de sesión para poderla usar fuera de esta función.
                $_SESSION['user'] = $user; //Guardo la información del usuario en una variable de sesión para poderla usar fuera de esta función.

                switch ($_SESSION['rol']) {
                    case 1: //Si el rol_id = 1 (id en base de datos para indicar el administrador).
                        header('Location:' . BASE_URL . 'administrador');
                        break;

                    case 2: //Si el rol_id = 2 (id en base de datos para indicar el operador).
                        header('Location:' . BASE_URL . 'operador');
                        break;

                    case 3: //Si el rol_id = 3 (id en base de datos para indicar el tecnico).
                        header('Location:' . BASE_URL . 'tecnico');
                        break;
                }
            }
        } else { //Si no hay una sesión activa.
            header('Location:' . BASE_URL . 'login'); //Redireccionar a la página de login.
        }
    }
}
