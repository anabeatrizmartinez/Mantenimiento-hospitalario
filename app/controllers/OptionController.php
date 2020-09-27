<?php

namespace App\Controllers;

use PDO;
use Sirius\Validation\Validator;

class OptionController
{
    public function getOption()
    {
        if (isset($_SESSION['userID'])) { //Si ya existe una sesión
            if ($_SESSION['rol'] == 2) { //Si el rol corresponde al operador.
                //Para mostrar los nombres de equipos de la base de datos como opciones en el formulario.
                global $pdo;

                $query = $pdo->prepare('SELECT name FROM equipment ORDER BY name');
                $query->execute();

                $names = $query->fetchAll(PDO::FETCH_OBJ); //Mostrar el resultado de la consulta.

                return render('../views/option.php', ['names' => $names]);
            }
        }

        header('Location:' . BASE_URL . 'login'); //Redireccionar a la página de login en caso de no tener una sesión activa o ser un usuario que no corresponde al operador.
    }

    public function postOption()
    {
        $errors = [];

        $validator = new Validator();
        $validator->add('name', 'required');

        $_SESSION['option'] = $_POST['name'];

        if ($validator->validate($_POST)) {
            switch ($_POST['option']) {
                case 'Actualizar':
                    header('Location:' . BASE_URL . 'update');
                    break;

                case 'Eliminar':
                    global $pdo;

                    $result = false;

                    $sql = 'DELETE FROM equipment WHERE name = :name';
                    $query = $pdo->prepare($sql);
                    $result = $query->execute([
                        'name' => $_SESSION['option']
                        ]);

                    return render('../views/option.php', ['result' => $result]);
                    break;
            }
        } else {
            $errors = $validator->getMessages();
        }

        //Vista a la que se quiere acceder
        return render('../views/option.php', ['errors' => $errors]);
    }
}
