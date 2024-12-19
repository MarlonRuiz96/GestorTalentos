<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PdfController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DpiModel');
        $this->load->model('CandidatoModel');
		$this->load->model('ReporteModel');



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

    public function solicitud($DPI) {
        // Obtener la ruta de la imagen desde los parámetros GET
        $imagePath = $this->input->get('imagePath');

        // Obtener el logo como base64
        // Obtener el logo y el GestorT como base64
    $base64Logo = $this->getBase64Image(base_url('uploads/grafica.png'));
    $base64LogoGestorT = $this->getBase64Image(base_url('assets/img/logo.png'));
    $encabezado = $this->getBase64Image(base_url('assets/reporte/solicitud.png'));

// Obtener los datos del candidato
		$candidatoData = $this->ReporteModel->getApplicant($DPI);

		$id = $candidatoData->id;
		$familyData = $this->ReporteModel->getFamilyData($id);
		$workExperience = $this->ReporteModel->getWorkExperience($id);
		$currentStudies = $this->ReporteModel->getCurrentStudies($id);
		$educationHistory = $this->ReporteModel->getEducationalHistory($id);
		$capacitaciones = $this->ReporteModel->getCapacitaciones($id);
		$skils = $this->ReporteModel->getSkills($id);
		$economic_contributions = $this->ReporteModel->getEconomicContributions($id);
		$references = $this->ReporteModel->getReferences($id);
		$socialEconomicData = $this->ReporteModel->getSocialEconomicData($id);
		$languages = $this->ReporteModel->getLanguages($id);
		$heath_data = $this->ReporteModel->getHeathData($id);
		$employment_preferences = $this->ReporteModel->getEmploymentPreferences($id);

		// Combinar todos los datos en un solo array
        $data = [
            'base64Logo' => $base64Logo,
            'imagePath' => $imagePath,
            'candidato_data' => $candidatoData,
			'family_data' => $familyData,
			'workExperience' => $workExperience,
			'currentStudies' => $currentStudies,
			'educationHistory' => $educationHistory,
			'skils' => $skils,
			'references' => $references,
			'economic_contributions' => $economic_contributions,
			'socialEconomicData' => $socialEconomicData,
			'capacitaciones' => $capacitaciones,
			'employment_preferences' => $employment_preferences,
			'languages' => $languages,
			'heath_data' => $heath_data,
            'logo'=> $base64LogoGestorT,
            'encabezado'=>$encabezado
        ];

    $html = $this->load->view('Reporte', $data, true);
        $this->dompdf->loadHtml($html);

        $this->dompdf->setPaper('letter', 'portrait');

        $this->dompdf->render();

        $output = $this->dompdf->output();
        $pdfFileName = 'Reporte' . '.pdf';

        header('Content-type: application/pdf');
        header("Content-Disposition: inline; filename=$pdfFileName");
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        echo $output;
    }
}

