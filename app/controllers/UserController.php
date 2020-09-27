<?php

namespace App\Controllers;

use PDO;
use Sirius\Validation\Validator;

class UserController
{
    public function getLogin() //El nombre de la ruta es lo que está escrito después del get. Debo tener el get porque es en la que se manda a llamar el formulario.
    {
        //Vista a la que se quiere acceder
        return render('../views/login.php');
    }

    public function postLogin() //Debo tener también para post porque es el método del formulario y aquí es donde se llenará y enviará.
    {
        //Querys de base de datos
        
        global $pdo;

        $errors = [];

        $validator = new Validator();
        $validator->add('name', 'required');
        $validator->add('password', 'required');

        if ($validator->validate($_POST)) { //Para verificar que cumpla con las validaciones.
            $sql = 'SELECT * FROM users WHERE name = :name';
            $query = $pdo->prepare($sql);
            $query->execute(['name' => $_POST['name']]);

            $user = $query->fetch(PDO::FETCH_OBJ); //Para convertir la consulta en un objeto con nombres de propiedades que se corresponden a los nombres de las columnas.
            if ($user) { //Si existe el usuario
                if (password_verify($_POST['password'], $user->password)) { //Si la contraseña es correcta. El password_verify() es para descifrar la contraseña ingresada con el método password_hash() de encriptación usado.
                    $_SESSION['userID'] = $user->id; //Guardo el id del usuario en una variable de sesión para poder identificar si hay una sesión iniciada, además así la puedo usar en el RolController.
                    header('Location:' . BASE_URL . 'rol'); //Redireccionar a la ruta para identificar el tipo de rol del usuario.
                    return null;
                }
            }

            $validator->addMessage('name', 'Nombre de usuario y/o contraseña incorrectos.'); //Si no se encuentra el usuario, se deja la duda en el mensaje de si estuvo mal la contraseña o el nombre para mayor seguridad.
        }

        $errors = $validator->getMessages();

        //Vista a la que se quiere acceder
        return render('../views/login.php', ['errors' => $errors]);
    }

    public function getRegister()
    {
        //Vista a la que se quiere acceder
        return render('../views/register.php');
    }

    public function postRegister()
    {
        //Querys de base de datos
        global $pdo;

        $result = false;
        $errors = [];

        $validator = new Validator();
        $validator->add('name', 'required');
        $validator->add('email', 'required');
        $validator->add('email', 'email'); //Para comprobar que tenga el formato de email.
        $validator->add('rol_id', 'required');
        $validator->add('password', 'required');

        if ($validator->validate($_POST)) { //Para validar lo que viene del global $_POST con la info de la base de datos.
            $sql = 'INSERT INTO users (name, email, rol_id, password) VALUES (:name, :email, :rol_id, :password)';
            $query = $pdo->prepare($sql);
            $result = $query->execute([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'rol_id' => $_POST['rol_id'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT) //Para ponerle un encriptado de seguridad al password.
            ]);
        } else {
            $errors = $validator->getMessages();
        }

        //Vista a la que se quiere acceder
        return render('../views/register.php', [
            'result' => $result,
            'errors' => $errors
            ]);
    }

    public function getLogout()
    {
        unset($_SESSION['userID']); //Eliminar la sesión
        header('Location:' . BASE_URL . 'login'); //Redireccionar a la página de login
    }
}
