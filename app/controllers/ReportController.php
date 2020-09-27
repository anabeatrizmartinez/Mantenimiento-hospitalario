<?php

namespace App\Controllers;

use PDO;
use Sirius\Validation\Validator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ReportController
{
    public function getReport()
    {
        if (isset($_SESSION['userID'])) { //Si ya existe una sesión
            if ($_SESSION['rol'] == 2) { //Si el rol corresponde al operador.
                //Para mostrar los nombres de equipos de la base de datos como opciones en el formulario.
                global $pdo;
        
                $query = $pdo->prepare('SELECT name FROM equipment ORDER BY name');
                $query->execute();
        
                $names = $query->fetchAll(PDO::FETCH_OBJ); //Mostrar el resultado de la consulta.

                return render('../views/report.php', ['names' => $names]);
            }
        }
        
        header('Location:' . BASE_URL . 'login'); //Redireccionar a la página de login en caso de no tener una sesión activa o ser un usuario que no corresponde al operador.
    }

    public function postReport()
    {
        global $pdo;

        $errors = [];
        
        $validator = new Validator();
        $validator->add('name', 'required');
        $validator->add('vista', 'required');
        
        if ($validator->validate($_POST)) {
            $sql = 'SELECT * FROM equipment WHERE name = :name';
            $query = $pdo->prepare($sql);
            $query->execute(['name' => $_POST['name']]);
            $report = $query->fetch(PDO::FETCH_ASSOC);
            
            $id = $report['id'];
            $name = $report['name'];
            $area = $report['area'];
            $estado = $report['estado'];
            $mantenimiento = $report['mantenimiento'];

            //Generar reportes usando librerías
            switch ($_POST['vista']) {
                case 'PDF':
                    $mpdf = new \Mpdf\Mpdf();
                    
                    $stylesheet = file_get_contents('../public/css/pdf.css');
                    $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
                    
                    //Estructura html a mostrar en el reporte.
                    $html = "
                    <header class='header'>
                        <img class='header__img' src='../images/header.png'>
                    </header>
                    <div class='container'>        
                        <h1>Reporte de equipo</h1>
                            <ul>
                                <li>ID: $id.</li>
                                <li>Nombre: $name.</li>
                                <li>Área de Ubicación: $area.</li>
                                <li>Estado: $estado.</li>
                                <li>Mantenimiento: $mantenimiento.</li>
                            </ul>
                    </div>
                    <footer class='footer'>
                        <img class='footer__img' src='../images/footer.png'>
                    </footer>";

                    $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

                    $mpdf->Output();
                    break;
                
                case 'Excel':
                    $spreadsheet = new Spreadsheet();
                    $sheet = $spreadsheet->getActiveSheet();
                    
                    //Encabezados
                    $sheet->setCellValue('A1', 'Reporte de equipo');
                    $sheet->setCellValue('A3', 'ID');
                    $sheet->setCellValue('B3', 'Nombre');
                    $sheet->setCellValue('C3', 'Área de Ubicación');
                    $sheet->setCellValue('D3', 'Estado');
                    $sheet->setCellValue('E3', 'Mantenimiento');

                    //Contenido
                    $sheet->setCellValue('A4', $id);
                    $sheet->setCellValue('B4', $name);
                    $sheet->setCellValue('C4', $area);
                    $sheet->setCellValue('D4', $estado);
                    $sheet->setCellValue('E4', $mantenimiento);

                    //Estilos
                    $spreadsheet->getActiveSheet()->mergeCells('A1:E1');
                    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
                    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                    $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    $spreadsheet->getActiveSheet()->getStyle('A3:E3')->getFont()->setBold(true);
                    $spreadsheet->getActiveSheet()->getStyle('A3:E4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                    
                    //headers para llamar archivo xlsx a descargar.
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //tipo para xlsx
                    header('Content-Disposition: attachment; filename=equipo.xlsx'); //Nombre de archivo.

                    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                    ob_end_clean(); //Limpiar el búfer y evitar errores.
                    $writer->save('php://output');
                    break;
            }
        } else {
            $errors = $validator->getMessages();
        }

        //Vista a la que se quiere acceder
        return render('../views/report.php', ['errors' => $errors]);
    }
}
