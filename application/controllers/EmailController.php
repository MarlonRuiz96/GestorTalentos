<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmailController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('autenticacion');
        $this->load->library('email');
        $this->load->model('CandidatoModel');
    }

    public function getDataCandidato($idCandidato)
    {
        // Retorna directamente los datos del modelo
        return $this->CandidatoModel->getCandidatoPorId($idCandidato);
    }
    public function getEventosCandidato($idCandidato)
    {
        return $this->CandidatoModel->getEventoPorId($idCandidato);
    }

    public function enviarCorreo($idCandidato)
    {
        // Obtiene los datos del candidato
        $candidato = $this->getDataCandidato(idCandidato: $idCandidato);
        $evento = $this->getEventosCandidato(idCandidato: $idCandidato);


        // Valida que el candidato exista
        if (empty($candidato)) {
            echo 'Error: No se encontró información para el candidato con ID ' . $idCandidato;
            return;
        }

        // Configura los detalles del correo
        $this->email->from('notificaciones@pruebasgestordetalentos.com', 'Notificaciones');
        $this->email->to('mruiz996@outlook.com');
        $this->email->subject('Entrevista Programada');

        $nombreCandidato = htmlspecialchars($candidato->Nombres);
        $fecha = htmlspecialchars($evento->Fecha);
        $hora = htmlspecialchars($evento->Hora);
        $direccion = htmlspecialchars($evento->Direccion);

$mensaje = "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Entrevista Programada</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .email-header {
            background: #007bff;
            color: #ffffff;
            padding: 15px;
            text-align: center;
        }
        .email-body {
            padding: 20px;
        }
        .email-footer {
            background: #f8f9fa;
            color: #6c757d;
            text-align: center;
            padding: 10px;
            font-size: 0.9em;
            border-top: 1px solid #dee2e6;
        }
        .btn-primary {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class='email-container'>
        <div class='email-header'>
            <h1>Entrevista Programada</h1>
        </div>
        <div class='email-body'>
            <p>Estimado/a <strong>$nombreCandidato</strong>,</p>
            <p>Nos complace informarle que su entrevista ha sido programada con los siguientes detalles:</p>
            <table class='table table-bordered'>
                <tbody>
                    <tr>
                        <th scope='row'>Nombre</th>
                        <td>$nombreCandidato</td>
                    </tr>
                    <tr>
                        <th scope='row'>Fecha</th>
                        <td>$fecha</td>
                    </tr>
                    <tr>
                        <th scope='row'>Hora</th>
                        <td>$hora</td>
                    </tr>
                    <tr>
                        <th scope='row'>Lugar</th>
                        <td>$direccion</td>
                    </tr>
                </tbody>
            </table>
            <p>Por favor, asegúrese de llegar puntualmente. Si tiene alguna pregunta o necesita cambiar la hora de su entrevista, no dude en contactarnos.</p>
            <p>
                <a href='mailto:notificaciones@pruebasgestordetalentos.com' class='btn-primary'>Contactar</a>
            </p>
        </div>
        <div class='email-footer'>
            <p>Este correo ha sido enviado por el sistema de gestión de talentos.</p>
            <p>Por favor, no responda a este mensaje.</p>
        </div>
    </div>
</body>
</html>";


        // Configurar mensaje HTML
        $this->email->set_mailtype('html');
        $this->email->message($mensaje);

        // Enviar correo y verificar resultado
        if ($this->email->send()) {
            echo 'Correo enviado con éxito a ';
        } else {
            echo 'Error al enviar el correo.';
            show_error($this->email->print_debugger());
        }
    }
}
