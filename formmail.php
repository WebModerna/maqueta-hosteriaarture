<link rel="shortcut icon" href="http://www.hotellosrobles.com.ar/favicon.ico" />
<title>Gracias por su comunicación, Lo Esperamos !!</title>
<body background="imagen/bot_volver.gif" bgcolor="#FFFFFF" text="#009900">
<?php
//  Nombre: Marklar FormMail
//  Version: 0.22
//  Fichero: formmail.phh
//  E-mail: webmaster@marklar-co.com
//  Site: http://www.marklar-co.com/
//  Descripcion:
//  Envio de Formularios a una dirección de correo
//  Fecha: 7 June 2002
//  Añadidos soporte redirección
//  Version: 0,21
//  Fecha: 21 May 2002
//	Añadido campos requeridos
//  Version: 0.2
//  Fecha: 14 March 2002
//  Version: 0.1
//  Fecha: 19 February 2002
//  Definición de constantes

define("APPNAME", "Mansaje enviado a traves del sitio web de Hotel Los Robles");

define("APPVERSION", "0.22");

define("APPURL", "http://www.hotellosrobles.com.ar");

//Variables por defecto
define("HSUBJECT", "Envienos su Requerimiento");


//Variables por defecto a modificar por el usuario


//Quién aparece como la persona que envia
define("HFROM", "Contacto desde pagina WEB");

//A quién se va a enviar el mensaje
define("HTO", "sucuevas@hotmail.com");

//Variables a modificar por el usuario

//$RequireFields = array("NombreUsuario");

//Ejemplo:

// $RequireFields = array("NombreUsuario","E-mail");

//Texto que aparece en el titulo de la pagina generada
$H_TITLE = "Formulario Enviado. Hotel los Robles se comunicará con usted a la brevedad. Muchas Gracias";
$H_RF_TITLE = "Complete los campos faltantes";

//Construyo el email de salida


$Header_from = empty($from) ? HFROM : $from;

$Header_to = empty($to) ? HTO : $to;

$Header_subject = empty($subject) ? HSUBJECT : $subject;

foreach($HTTP_POST_VARS as $key => $value){

	$Header_body .= "\n $key = $value";

}

foreach($HTTP_GET_VARS as $key => $value){

	$Header_body .= "\n $key = $value";

}

$info = "\n\nInformacion del cliente que envio el formulario: \n";

$info .=    "------------------------------------------------\n";

$info .= "Referer: ${HTTP_REFERER}\n";

$info .= "User-Agent: ${HTTP_USER_AGENT}\n";

$info .= "Remote-Address: ${REMOTE_ADDR}\n";



$info .= "\n\n DATOS DE LA PERSONA QUE ENVIA: \n";

$info .=     "-------------------------------------------------\n";

$info .= "DATOS: ${SCRIPT_URI}\n";



$app = "\n\nMensaje enviado por " . APPNAME . " v" . APPVERSION . "\n\n" . APPURL;

$Header_body = $info . $Header_body . $app;

$Headers = "From: ${Header_from}\r\n";

$error=false;

if (is_array($RequireFields))
{
	for($i=0 ; $i < count($RequireFields) ; $i++)
	{
		$temp = $RequireFields[$i];

		if(empty($$temp))
			{
				$error = true;
				$H_TITLE = $H_RF_TITLE;
				break;
			}
	}
}

if(!$error)
{
	mail("$Header_to","$Header_subject","$Header_body","$Headers");
}

if(empty($redirect) || $error )
{
	echo "<!-- FormMail v0.22 http://www.marklar-co.com -->\n";

	echo "<!-- Fecha modificacion: 2002-06-07 -->";

	echo "<HTML>\n<HEAD>\n<TITLE>${H_TITLE}</TITLE>\n</HEAD>\n";

	echo "<H1>${H_TITLE}</H1>";

	if($error)
	{
		echo "<div align=\"center\"><BR>Falta un campo requerido</BR></div>\n";
	}
	
	echo "Volver a la página <A href=\"javascript:history.go(-1);\">anterior</a>\n";
	
	echo "</BODY><HTML>\n";

}
else
{
	Header("location: " . $redirect);
}