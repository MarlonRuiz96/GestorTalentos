<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Correo
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('email');
    }

    /**
     * Envía un correo basado en una plantilla y datos proporcionados.
     *
     * @param string $destinatario Correo del destinatario.
     * @param string $asunto Asunto del correo.
     * @param string $plantilla Nombre de la plantilla.
     * @param array $datos Datos para renderizar la plantilla.
     * @return bool True si se envió correctamente, false en caso contrario.
     */
    public function enviarCorreo($destinatario, $asunto, $plantilla, $datos = [])
    {
        // Obtiene el contenido de la plantilla
        $mensaje = $this->renderizarPlantilla($plantilla, $datos);

        if (!$mensaje) {
            log_message('error', 'Plantilla no encontrada: ' . $plantilla);
            return false;
        }

        // Configura el correo
        $this->CI->email->from('notificaciones@pruebasgestordetalentos.com', 'Notificaciones');
        $this->CI->email->to($destinatario);
        $this->CI->email->subject($asunto);
        $this->CI->email->message($mensaje);
        $this->CI->email->set_mailtype('html');

        // Envía el correo
        if (!$this->CI->email->send()) {
            log_message('error', 'Error al enviar correo: ' . $this->CI->email->print_debugger());
            return false;
        }

        return true;
    }

    /**
     * Renderiza una plantilla HTML con datos.
     *
     * @param string $plantilla Nombre de la plantilla (sin extensión).
     * @param array $datos Datos para incluir en la plantilla.
     * @return string|bool Contenido renderizado o false si no se encuentra la plantilla.
     */
    private function renderizarPlantilla($plantilla, $datos)
    {
        $rutaPlantilla = APPPATH . 'views/Plantillas/' . $plantilla . '.php';

        if (!file_exists($rutaPlantilla)) {
            return false;
        }

        // Extrae los datos como variables
        extract($datos);

        // Captura el contenido de la plantilla
        ob_start();
        include($rutaPlantilla);
        $contenido = ob_get_clean();

        return $contenido;
    }

}
