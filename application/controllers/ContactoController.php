<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContactoController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CandidatoModel');
        $this->load->library('correo');
    }

    public function index()
    {
        $data['contactoCorreo'] = $this->CandidatoModel->getCorreoYNombre();
        $this->load->view('Contacto/index', $data);
    }

    public function EnviarCorreo()
    {
        $asunto = $this->input->post('asunto');
        $correo = $this->input->post('correo');
        $cuerpoCorreo = $this->input->post('cuerpo');

        $datosCorreo = [
            'cuerpo' => $cuerpoCorreo
        ];

        if ($this->correo->enviarCorreo($correo, $asunto, 'Generico', $datosCorreo)) {
            echo json_encode(['status' => 'success', 'message' => 'Correo enviado con éxito.']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Error al enviar el correo.']);
        }
    }
    public function leerBandeja()
{
    // Parámetros de IMAP (ajusta según tu configuración real)
    $hostname = '{imap.hostinger.com:993/imap/ssl}INBOX';
    $username = 'notificaciones@pruebasgestordetalentos.com';
    $password = 'Pisica2011.'; // Contraseña real

    // 1) Conectar manualmente y verificar error
    $inbox = @imap_open($hostname, $username, $password);
    if (!$inbox) {
        // Obtiene el error de IMAP
        $errorImap = imap_last_error();

        // Devolvemos el error en JSON
        echo json_encode([
            'status' => 'error',
            'message' => 'Error al conectar IMAP: ' . $errorImap
        ]);
        return;
    }

    // 2) Si la conexión fue exitosa, buscar correos
    $emails = imap_search($inbox, 'ALL');
    if (!$emails) {
        // Posible que no haya correos o que fallen
        $errorImap = imap_last_error();

        // Cerramos IMAP antes de salir
        imap_close($inbox);

        echo json_encode([
            'status' => 'ok',
            'message' => 'Sin correos o error en imap_search: ' . $errorImap,
            'emails'  => []
        ]);
        return;
    }

    // Ordenar desc (más reciente primero)
    rsort($emails);

    // 3) Recorrer correos
    $mensajes = [];
    foreach ($emails as $numEmail) {
        $header = imap_headerinfo($inbox, $numEmail);
        $asunto = isset($header->subject) ? imap_utf8($header->subject) : '(sin asunto)';

        $from = '(desconocido)';
        if (isset($header->from[0]->mailbox) && isset($header->from[0]->host)) {
            $from = $header->from[0]->mailbox . '@' . $header->from[0]->host;
        }

        $fecha = isset($header->date) ? $header->date : '(sin fecha)';

        // El cuerpo podría estar en parte '1' o '1.1'
        $cuerpo = imap_fetchbody($inbox, $numEmail, '1');
        if (!$cuerpo) {
            $cuerpo = '(sin contenido)';
        }

        $mensajes[] = [
            'numero'    => $numEmail,
            'asunto'    => $asunto,
            'remitente' => $from,
            'fecha'     => $fecha,
            'cuerpo'    => $cuerpo
        ];
    }

    imap_close($inbox);

    // 4) Devolver éxito con los correos
    echo json_encode([
        'status' => 'ok',
        'emails' => $mensajes
    ]);
}

}
