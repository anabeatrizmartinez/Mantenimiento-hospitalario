<!--   Front Controller   -->

<?php

//Inicializar el sistema de errores

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Autoloading de composer con PSR-4

require_once '../vendor/autoload.php'; //Con esto ya puedo utilizar las clases de phroute directamente, sin necesidad de hacer los include o require de los archivos tal cual que usa la librería.

//Para crear una constante con la url completa. Debe ir primero para que ya esté cargado en las demás vistas.

$baseFile = $_SERVER['SCRIPT_NAME']; //Me devuelve el directorio base CON el archivo raiz: /Trabajo/public/index.php
$raiz = basename($baseFile); //Me devuelve la raiz del proyecto: index.php
$baseDir = str_replace($raiz, '', $baseFile); //Me devuelve el directorio base SIN el archivo raiz: /Trabajo/public/

$baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir; //Me devuelve la Url base: http://localhost/Trabajo/public/

define('BASE_URL', $baseUrl);

//Crear una ruta para llamar los demás archivos

$route = $_GET['route'] ?? '/'; //Operador Null para saber si existe, y en caso de que no exista, asumimos que estamos en la raíz de la aplicación.

//Definir el route collector, de la libreria phroute.

use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

//Llamando las vistas:

//Vista Principal:
$router->controller('/', App\Controllers\IndexController::class); //el primer parámetro es el nombre que se le dará a la ubicación del render(). El 2do parámetro es la clase del controlador que manejará la ruta.
//Vista de Usuarios:
$router->controller('/', App\Controllers\UserController::class);
//Vista de Operador:
$router->controller('/', App\Controllers\OperadorController::class);
//Vista de Equipos:
$router->controller('/', App\Controllers\EquipmentController::class);
//Vista de Reporte:
$router->controller('/', App\Controllers\ReportController::class);

//Dispatcher de phroute. Debe ir después de llamar las vistas.

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData()); //Crear el objeto que va a llamar a los demás archivos.
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route); //Respuesta que regresa el dispatcher.

echo $response;


//Función "render" para llamar las vistas

function render($fileName, $params = []) //$fileName: archivo que queremos llamar, $params: variables a usar dentro de la vista, iniciada como arreglo vacío por si no se tiene ese parámetro al llamar la función.
{
    ob_start(); //Omitir las salidas del momento, se guardan en un buffer interno de php mientras se hacen más procesos antes de mostrarse en el navegador.

    extract($params);
    include $fileName;

    return ob_get_clean(); //Se trae los elementos actuales del buffer y lo limpia de nuevo. Regresa como una cadena todo lo escrito entre el ob_start() y el ob_get_clean(). Para tener más control del resultado y que se envíe con el $response del dispatcher.
}
