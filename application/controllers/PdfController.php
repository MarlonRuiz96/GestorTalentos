<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PdfController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DpiModel');
        $this->load->model('CandidatoModel');
        

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
    private function getBase64Image($path) {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        return 'data:image/' . $ext . ';base64,' . base64_encode($data);
    }

    public function facturaPdf($idCandidato) {
        // Obtener la ruta de la imagen desde los parámetros GET
        $imagePath = $this->input->get('imagePath');

        // Obtener el logo como base64
        // Obtener el logo y el GestorT como base64
    $base64Logo = $this->getBase64Image(base_url('uploads/grafica.png'));
    $base64LogoGestorT = $this->getBase64Image(base_url('assets/img/logo.png'));
    $encabezado = $this->getBase64Image(base_url('assets/img/encabezado.png'));



        // Obtener los datos del candidato
        $candidatoData = $this->CandidatoModel->getCandidatoPorId($idCandidato);
        $dataTemperamento = $this->CandidatoModel->getDatosPrueba($idCandidato);
        $dataBriggs = $this->CandidatoModel->getDatosBriggs($idCandidato);
        $dataValanti = $this->CandidatoModel->getDatosValanti($idCandidato);
        $data16pf = $this->CandidatoModel->getDatos16pf($idCandidato);

        // Combinar todos los datos en un solo array
        $data = [
            'base64Logo' => $base64Logo,
            'imagePath' => $imagePath,
            'candidato_data' => $candidatoData,
            'dataTemperamento' => $dataTemperamento,
            'dataBriggs' => $dataBriggs,
            'dataValanti' => $dataValanti,
            'data16pf' => $data16pf,
            'logo'=> $base64LogoGestorT,
            'encabezado'=>$encabezado
        ];

    // Pasar los datos a la vista
    $html = $this->load->view('Reporte', $data, true);
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