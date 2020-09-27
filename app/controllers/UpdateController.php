<?php

namespace App\Controllers;

use PDO;

class UpdateController
{
    public function getUpdate()
    {
        if (isset($_SESSION['userID'])) { //Si ya existe una sesión
            if ($_SESSION['rol'] == 2) { //Si el rol corresponde al operador.
                //Para mostrar los campos del equipos con el que se accedió.
                global $pdo;
        
                $query = $pdo->prepare('SELECT * FROM equipment WHERE name = :name');
                $query->execute(['name' => $_SESSION['option']]);
        
                $equipment = $query->fetch(PDO::FETCH_ASSOC); //Mostrar el resultado de la consulta.

                $_SESSION['optionID'] = $equipment['id'];

                return render('../views/update.php', ['equipment' => $equipment]);
            }
        }
        
        header('Location:' . BASE_URL . 'login'); //Redireccionar a la página de login en caso de no tener una sesión activa o ser un usuario que no corresponde al operador.
    }

    public function postUpdate()
    {
        global $pdo;

        $result = false;

        $sql = 'UPDATE equipment SET name = :name, area = :area, estado = :estado, mantenimiento = :mantenimiento WHERE id = :id';
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'id' => $_SESSION['optionID'],
            'name' => $_POST['name'],
            'area' => $_POST['area'],
            'estado' => $_POST['estado'],
            'mantenimiento' => $_POST['mantenimiento']
        ]);

        return render('../views/update.php', ['result' => $result]);
    }
}
