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
            
            $user = $query->fetch(PDO::FETCH_OBJ);
            
            if ($user) {
                $_SESSION['rol'] = $user->rol_id;
                $_SESSION['user'] = $user;

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
            header('Location:' . BASE_URL . 'login');
        }
    }

    public function getAdministrador()
    {
        if (isset($_SESSION['userID'])) { //Si ya existe una sesión
            if ($_SESSION['rol'] == 1) { //Si existe el usuario y corresponde al administrador.
                return render('../views/admin.php', ['user' => $_SESSION['user']]);
            }
        }

        header('Location:' . BASE_URL . 'login');
    }

    public function getOperador()
    {
        if (isset($_SESSION['userID'])) { //Si ya existe una sesión
            if ($_SESSION['rol'] == 2) { //Si existe el usuario y corresponde al operador.
                return render('../views/operator.php', ['user' => $_SESSION['user']]);
            }
        }
        
        header('Location:' . BASE_URL . 'login');
    }

    public function getTecnico()
    {
        if (isset($_SESSION['userID'])) { //Si ya existe una sesión
            if ($_SESSION['rol'] == 3) { //Si existe el usuario y corresponde al tecnico.
                return render('../views/tecnico.php', ['user' => $_SESSION['user']]);
            }
        }

        header('Location:' . BASE_URL . 'login');
    }
}
