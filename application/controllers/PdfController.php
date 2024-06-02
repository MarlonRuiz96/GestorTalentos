<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PdfController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        require_once(APPPATH . 'libraries/dompdf/autoload.inc.php');
        $this->dompdf = new \Dompdf\Dompdf();
    }

    public function uploadImage() {
        // Obtener la imagen en base64
        $imageData = $this->input->post('image');
        if ($imageData) {
            // Extraer los datos de la imagen
            list($type, $data) = explode(';', $imageData);
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);

            // Generar un nombre de archivo único
            $fileName = 'grafica' . '.png';
            $filePath = FCPATH . 'uploads/' . $fileName;

            // Guardar la imagen en el servidor
            file_put_contents($filePath, $data);

            // Devolver la ruta relativa de la imagen
            echo base_url('uploads/' . $fileName);
        }
    }

    public function facturaPdf($idCandidato) {
        // Obtener la ruta de la imagen desde los parámetros GET
        $imagePath = $this->input->get('imagePath');

        // Obtener el logo como base64
        $logoPath = base_url('uploads/grafica.png');
        $ext = pathinfo($logoPath, PATHINFO_EXTENSION);
        $data = file_get_contents($logoPath);
        $base64Logo = 'data:image/' . $ext . ';base64,' . base64_encode($data);

        // Pasar los datos a la vista
        $viewData = [
            'base64Logo' => $base64Logo,
            'imagePath' => $imagePath
        ];

        $html = $this->load->view('Reporte', $viewData, true);

        // Cargar contenido HTML
        $this->dompdf->loadHtml($html);

        // (Opcional) Configurar el tamaño y la orientación del papel
        $this->dompdf->setPaper('letter', 'portrait');

        // Renderizar el HTML como PDF
        $this->dompdf->render();

        // Salida del PDF generado
        $output = $this->dompdf->output();
        $pdfFileName = 'reporte' . '.pdf';

        header('Content-type: application/pdf');
        header("Content-Disposition: inline; filename=$pdfFileName");
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        echo $output;
    }
}
?>