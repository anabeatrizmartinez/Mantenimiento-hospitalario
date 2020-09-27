<?php

namespace App\Controllers;

use PDO;

class EquipmentController
{
    public function getEquipment()
    {
        if (isset($_SESSION['userID'])) { //Si ya existe una sesión
            if ($_SESSION['rol'] == 2) { //Si el rol corresponde al operador.
                global $pdo;
        
                $query = $pdo->prepare('SELECT * FROM equipment ORDER BY name'); //Preparo la consulta
                $query->execute(); //Ejecuto la consulta
        
                $equipments = $query->fetchAll(PDO::FETCH_ASSOC); //Mostrar el resultado de la consulta. El FETCH_ASSOC muestra solo los datos con el nombre de columna, así no se ven duplicados al mostrarlos también con la llave numérica (como viene por defecto).
        
                //Vista a la que se quiere acceder
                return render('../views/equipment.php', ['equipments' => $equipments]);
            }
        }

        header('Location:' . BASE_URL . 'login'); //Redireccionar a la página de login en caso de no tener una sesión activa o ser un usuario que no corresponde al operador.
    }

    public function getNewequipment()
    {
        //Vista a la que se quiere acceder
        return render('../views/new-equipment.php');
    }
    public function postNewequipment()
    {
        //Querys de base de datos
        global $pdo;

        $result = false;
        
        $sql = 'INSERT INTO equipment (name, area, estado, mantenimiento) VALUES (:name, :area, :estado, :mantenimiento)';
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'name' => $_POST['name'],
            'area' => $_POST['area'],
            'estado' => $_POST['estado'],
            'mantenimiento' => $_POST['mantenimiento']
        ]);

        //Vista a la que se quiere acceder
        return render('../views/new-equipment.php', ['result' => $result]);
    }
}
