<?php
include_once("Funciones/FuncionesPanel.php");
function br($texto, $max)
{
	if(strlen($texto) > $max) 
	//si el texto tiene mas de los caracteres que le indicamos con la variable $max
	{ 
		$texto = wordwrap($texto,$max,"<br>",1);
		//nos lo corta a la cantidad de caracteres indicado
	}
	else
	{
		$texto = $texto;
		// si no llega a los caracteres incicado, pues lo deja tal cual
		return $texto;      
	}
}

if ( isset($_POST["enviado"]) && $_POST["email"] <> "" )
{
	$fecha_llegada = $_POST["anoLL"]	. "-"	.	$_POST["mesLL"]	. "-" .	$_POST["diaLL"];
	$fecha_partida = $_POST["anoP"] 	. "-"	.	$_POST["mesP"]	. "-" .	$_POST["diaP"];

	$asunto = _e('Consulta vía web', 'hosteriaarture'); 
	
	$cuerpo = ' 
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html" />
		<meta charset="utf-8" />
		<title>Los Robles</title>
		<body>
		<table width="80" border="0" align="center" cellpadding="0" cellspacing="0" >
			<tr>
				<td><table width="950" border="0" align="center" cellpadding="0" cellspacing="0" >
					<tr>
						<td valign="top"><table width="80%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td colspan="2" align="left" valign="top"><table width="100%" border="0" cellspacing="0">
											<tr>
												<td>
													<table width="121%" border="0" height="259">
														<tr>
															<td height="19" colspan="3" align="center" >
																<div align="center">Consultas</div>
																</td>
														</tr>
														<tr>
														 <td valign="top" ><blockquote>Se ha recibido la siguiente consulta:<BR> ';
		
	$cuerpo.='<BR>';
	$cuerpo.='Tipo de Consulta:';
	$cuerpo.=' ';
	$cuerpo.=$_POST["Requerimiento"];
	$cuerpo.='<BR>';
	$cuerpo.='Apellido y Nombre:';
	$cuerpo.=' ';
	$cuerpo.=$_POST["Nombre"];
	$cuerpo.='<BR>';
	$cuerpo.='Ciudad:';
	$cuerpo.=' ';
	$cuerpo.=$_POST["ciudad"];
	$cuerpo.='<BR>';
	$cuerpo.='Pais:';
	$cuerpo.=' ';
	$cuerpo.=$_POST["pais"];
	$cuerpo.='<BR>';
	$cuerpo.='Telefono:';
	$cuerpo.=' ';
	$cuerpo.=$_POST["telefono"];
	$cuerpo.='<BR>';
	$cuerpo.='Email:';
	$cuerpo.=' ';
	$cuerpo.=$_POST["email"];
	$cuerpo.='<BR>';
	$cuerpo.='Tipo de Habitacion:';
	$cuerpo.=' ';
	$cuerpo.='Habitacion '.$_POST["tipoHabitacion"];
	$cuerpo.=' ';
	$cuerpo.='<BR>';
	$cuerpo.='Cantidad de Personas:';
	$cuerpo.=' ';
	$cuerpo.='<BR>';
	$cuerpo.='Adultos:';
	$cuerpo.=' ';
	$cuerpo.=$_POST["CantidadA"];
	$cuerpo.='<BR>';
	$cuerpo.='NiÃ±os:';
	$cuerpo.=' ';
	$cuerpo.=$_POST["CantidadN"];
	$cuerpo.='<BR>';
	$cuerpo.='Bebes:';
	$cuerpo.=' ';
	$cuerpo.=$_POST["CantidadB"];
	$cuerpo.='<BR>';
	$cuerpo.='Fecha de Llegada:';
	$cuerpo.=' ';
	$cuerpo.=date("d-m-Y",(strtotime($fecha_llegada)));
	$cuerpo.='<BR>';
	$cuerpo.='Fecha de Partida:';
	$cuerpo.=' ';
	$cuerpo.=date("d-m-Y",(strtotime($fecha_partida)));
	$cuerpo.='<BR>';
	$cuerpo.='Mensaje:';
	$cuerpo.=' ';
	$cuerpo.=br($_POST["Mensaje"],70);
	$cuerpo.='
																</td>
															</tr>
													</table>
												</td>
											</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td  colspan="3" valign="top" >
									<div align="center"  class="blanco-foot"></div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
'; 

	//para el envío en formato HTML 
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

	//dirección del remitente 
	$headers .= "From: Consultas\r\n"; 
		
	$email2="info@hotellosrobles.com.ar";

	$t=mail($email2,$asunto,$cuerpo,$headers);

} else {
	header("Location: tarifas.php?email='no'");
};
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Hotel Los Robles:::::</title>
		<link rel="stylesheet" type="text/css" href="gallery/styleold.css" />
		<script type="text/javascript" src="js/prototype.js"></script>
		<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="js/lightbox.js"></script>
		<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
		<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="top_menu">
			<script type="text/javascript">
				AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','855','height','28','src','flash/menu2B','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','wmode','transparent','movie','flash/menu2B' ); //end AC code
			</script>
			<noscript>
				<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase=					"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="855" height="28" >
					<param name="movie" value="flash/menu2B.swf" />
					<param name="quality" value="high" />
					<param name="wmode" value="transparent" />
					<embed src="flash/menu2B.swf" width="855" height="28" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" wmode="transparent"></embed>
				</object>
			</noscript>
		</div>
		<div id="main_content">
			<div id="top_banner">
				<script type="text/javascript">
					AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','851','height','100','src','flash/logo2','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','flash/logo2' ); //end AC code
				</script>
				<noscript>
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="851" height="100">
					<param name="movie" value="flash/logo2.swf" />
					<param name="quality" value="high" />
					<embed src="flash/logo2.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="851" height="100"></embed>
				</object>
				</noscript>
			</div>
		
			<div id="page_content_left_tarifas">
				<div class="title">
					<p><strong>Gracias por contactarnos</strong></p>
					<p>&nbsp;</p>
				</div>
						
				<div class="content_text">
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p> <p>&nbsp;</p> 
				</div> 
			</div>
			<div id="page_bottom">
				<div class="content_text"></div>
			</div>
		</div>

		<div id="footer">
		<div id="footer_content">
			<div id="copyrights"></div>
			<div>
				<ul class="footer_menu">
					<li><a href="index.html" class="nav2">Home </a></li>
					<li><a href="servicios.html" class="nav2">Servicios</a></li>
					<li><a href="habitaciones.html" class="nav2">Habitaciones</a></li>
					<li><a href="tarifas.php" class="nav2">Reservas</a></li>
					<li><a href="ubicacion.html" class="nav2">Ubicacion</a></li>
					<li><a href="vacaciones.html" class="nav2">Sus Vacaciones</a></li>
					<li><a href="excursiones.html" class="nav2">Excursiones</a></li>
					<li><a href="tarifas.php" class="nav2">Contacto</a></li>
				</ul>
			</div>
			<div id="madeby">HumanBlinkÂ®<br /></div>
		</div>
	</div>
	</body>
</html>