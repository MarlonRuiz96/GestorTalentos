<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmailController extends CI_Controller
{
    public function enviarCorreo()
    {
        // Carga la biblioteca de correo
        $this->load->library('email');

        // Configura los detalles del correo
        $this->email->from('notificaciones@tudominio.com', 'Notificaciones');
        $this->email->to('destinatario@ejemplo.com');
        $this->email->subject('Correo de prueba desde CodeIgniter');
        $this->email->message('<h1>¡Hola!</h1><p>Este es un correo de prueba enviado desde CodeIgniter utilizando Hostinger.</p>');

        // Enviar correo
        if ($this->email->send()) {
            echo 'Correo enviado exitosamente.';
        } else {
            // Muestra el error en caso de falla
            echo 'Error al enviar el correo.';
            echo $this->email->print_debugger();
        }
    }
}
