<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Correo
{
    protected $CI;

    public function __construct()
    {
        // Obtenemos la instancia principal de CodeIgniter
        $this->CI =& get_instance();
        // Cargamos la librería 'email' por si se usa para enviar
        $this->CI->load->library('email');
    }

    /**
     * 1) Envía un correo basado en una plantilla y datos proporcionados.
     *
     * @param string $destinatario Correo del destinatario.
     * @param string $asunto       Asunto del correo.
     * @param string $plantilla    Nombre de la plantilla (sin extensión).
     * @param array  $datos        Datos para renderizar la plantilla.
     * @return bool  True si se envió correctamente, false en caso contrario.
     */
    public function enviarCorreo($destinatario, $asunto, $plantilla, $datos = [])
    {
        // Renderiza la plantilla y obtiene su contenido HTML
        $mensaje = $this->renderizarPlantilla($plantilla, $datos);
        if (!$mensaje) {
            log_message('error', 'Plantilla no encontrada: ' . $plantilla);
            return false;
        }

        // Configura el correo para enviarlo
        $this->CI->email->from('notificaciones@pruebasgestordetalentos.com', 'Notificaciones');
        $this->CI->email->to($destinatario);
        $this->CI->email->subject($asunto);

        // Aseguramos que el contenido sea interpretado como HTML
        $this->CI->email->set_mailtype('html');
        $this->CI->email->message($mensaje);

        // Envía el correo
        if (!$this->CI->email->send()) {
            log_message('error', 'Error al enviar correo: ' . $this->CI->email->print_debugger());
            return false;
        }

        return true;
    }

    /**
     * 2) Envía un correo directamente con contenido HTML, sin usar plantilla.
     *
     * @param string $destinatario  Correo del destinatario.
     * @param string $asunto        Asunto del correo.
     * @param string $contenidoHTML Contenido HTML a enviar.
     * @return bool  True si se envió correctamente, false en caso contrario.
     */
    public function enviarCorreoSinPlantilla($destinatario, $asunto, $contenidoHTML)
    {
        // Configura el correo para enviarlo
        $this->CI->email->from('notificaciones@pruebasgestordetalentos.com', 'Notificaciones');
        $this->CI->email->to($destinatario);
        $this->CI->email->subject($asunto);

        // Aseguramos que el contenido sea interpretado como HTML
        $this->CI->email->set_mailtype('html');
        $this->CI->email->message($contenidoHTML);

        // Envía el correo
        if (!$this->CI->email->send()) {
            log_message('error', 'Error al enviar correo: ' . $this->CI->email->print_debugger());
            return false;
        }

        return true;
    }

    /**
     * 3) Lee correos de la bandeja de entrada usando IMAP.
     *
     * @param string $hostname  Ej: '{imap.hostinger.com:993/imap/ssl}INBOX'
     * @param string $username  Correo completo (ej: 'notificaciones@pruebasgestordetalentos.com')
     * @param string $password  Contraseña de esa cuenta
     * @return array            Arreglo con información de cada correo (asunto, remitente, fecha, cuerpo, etc.)
     */
    public function leerCorreosIMAP($hostname, $username, $password)
    {
        // Abre la conexión IMAP
        $inbox = imap_open($hostname, $username, $password);
        if (!$inbox) {
            log_message('error', 'Error al conectar IMAP: ' . imap_last_error());
            return [];
        }

        // Busca todos los correos (usar 'UNSEEN' para no leídos, 'ALL' para todos)
        $emails = imap_search($inbox, 'ALL');
        if (!$emails) {
            imap_close($inbox);
            return [];
        }

        // Orden descendente (más reciente primero)
        rsort($emails);

        $mensajes = [];

        foreach ($emails as $numEmail) {
            // Cabecera
            $header = imap_headerinfo($inbox, $numEmail);

            // Asunto (decodificado para UTF-8 si es necesario)
            $asunto = isset($header->subject) ? imap_utf8($header->subject) : '(sin asunto)';

            // Remitente
            $from = '(desconocido)';
            if (isset($header->from[0]->mailbox) && isset($header->from[0]->host)) {
                $from = $header->from[0]->mailbox . '@' . $header->from[0]->host;
            }

            // Fecha
            $fecha = isset($header->date) ? $header->date : '(sin fecha)';

            // Cuerpo: se asume que la parte '1' es texto plano o HTML.
            // A veces hay que usar '1.1' dependiendo del formato.
            $cuerpo = imap_fetchbody($inbox, $numEmail, '1');
            if (!$cuerpo) {
                $cuerpo = '(sin contenido)';
            }

            // Almacenamos los datos
            $mensajes[] = [
                'numero'    => $numEmail,
                'asunto'    => $asunto,
                'remitente' => $from,
                'fecha'     => $fecha,
                'cuerpo'    => $cuerpo
            ];
        }

        // Cierra la conexión
        imap_close($inbox);

        return $mensajes;
    }

    /**
     * Función privada que renderiza la plantilla y devuelve su contenido HTML en un string.
     *
     * @param string $plantilla Nombre de la plantilla (sin extensión).
     * @param array  $datos     Datos para incluir en la plantilla.
     * @return string|bool      Contenido HTML renderizado o false si no encuentra la plantilla.
     */
    private function renderizarPlantilla($plantilla, $datos)
    {
        // Ubicación de la plantilla (ajusta si tu estructura es distinta)
        $rutaPlantilla = APPPATH . 'views/Plantillas/' . $plantilla . '.php';

        if (!file_exists($rutaPlantilla)) {
            return false;
        }

        // Extrae los datos como variables para usarlos en la plantilla
        extract($datos);

        // Captura el contenido de la plantilla
        ob_start();
        include($rutaPlantilla);
        $contenido = ob_get_clean();

        return $contenido;
    }
}
