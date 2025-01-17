<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.hostinger.com';
$config['smtp_user'] = 'notificaciones@pruebasgestordetalentos.com'; // Cambia esto por tu correo de Hostinger
$config['smtp_pass'] = 'Pisica2011.'; // Cambia esto por la contraseña de tu correo
$config['smtp_port'] = 465; // Usa 587 para TLS o 465 para SSL
$config['smtp_crypto'] = 'ssl'; // Cambia a 'tls' si usas puerto 587
$config['mailtype'] = 'html'; // Puede ser 'text' o 'html'
$config['charset'] = 'utf-8';
$config['wordwrap'] = true;
$config['newline'] = "\r\n"; // Importante para SMTP
