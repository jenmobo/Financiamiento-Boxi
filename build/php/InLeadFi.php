<?
session_start();
date_default_timezone_set('America/Bogota');

require_once ("phpmailer/PHPMailerAutoload.php");
require_once("verificar.php");

$usuario = $_SESSION['usuarioWeb'];
$fecha = date("Y-m-d");
$hora = date("H:i:s");
$marca = addslashes($_POST['marca']);
$colchon = addslashes($_POST['colchon']);
$precio = addslashes($_POST['precio']);
$ciudad = addslashes($_POST['ciudad']);
$nombre = addslashes($_POST['nombre']);
$tipoDocumento = addslashes($_POST['tipoDocumento']);
$cedula = addslashes($_POST['cedula']);
$email = addslashes($_POST['email']);
$telefono = addslashes($_POST['telefono']);
$canal = addslashes($_POST['canal']);
$contesto = addslashes($_POST['contesto']);
$estado = addslashes($_POST['estado']);
$comentarios = addslashes($_POST['comentarios']);


if(check_session()) {	
	$mysqli = conexion();
	$result = $mysqli->query("SELECT * FROM inLeadFi WHERE cedula ='$cedula' ");
	$filas = $result->num_rows;	
	if($filas>0) {
		echo "usuario encontrado";		
	}else {		
		// cargamos el nombre del asesor 
		$usuarioGeneral = $_SESSION['usuarioWeb'];		
		$result = $mysqli->query("SELECT * FROM usuarios WHERE usuario ='$usuarioGeneral' ");
		$filas = $result->num_rows;		
		if($filas>0) {
			// cargamos el nombre del asesor 
		  	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		    	$asesor = $row['nombres'];		    	
			}
			// revisamos si no se contacto la persona 
			$etapa = 'estudio de financiamiento';
			if($estado == "volver a contactar"){
				$etapa = 'en contacto';
			}else {
				$etapa = 'estudio de financiamiento';
			}			
			$insert = $mysqli->query("INSERT INTO `inleadfi` (`asesor`,`fecha-creacion`, `hora-creacion`, `marca`, `colchon`, `precio`, `ciudad`, `nombre`, `tipoDocumento`, `cedula`, `email`, `telefono`, `canal`, `contesto`, `estado`, `comentarios`, `etapa`, `resultado`) VALUES ('$asesor', '$fecha', '$hora', '$marca', '$colchon', '$precio', '$ciudad', '$nombre', '$tipoDocumento', '$cedula', '$email', '$telefono', '$canal', '$contesto', '$estado', '$comentarios', '$etapa', '$etapa')")or die($mysqli->error);
			if($insert) {
				echo "1";
				if($estado == "volver a contactar") {					
					// ==============  ENVIO DE CORREOS ========================== //
					$mail = new PHPMailer(true);					
					//Tell PHPMailer to use SMTP
					$mail->Mailer = "smtp";
					$mail->isSMTP();
					$mail->Hello = "estudio@financiamientoboxi.com";
					//Enable SMTP debugging
					// 0 = off (for production use)
					// 1 = client messages
					// 2 = client and server messages
					$mail->SMTPDebug = 0;					
					//Ask for HTML-friendly debug output
					$mail->Debugoutput = 'html';
					//Set the hostname of the mail server
					$mail->Host = "rs02.hostingdepago.com";
					//Set the SMTP port number - likely to be 25, 465 or 587
					$mail->Port = 25;
					//Set the encryption system to use - ssl (deprecated) or tls
					$mail->SMTPSecure = 'tls';
					//Whether to use SMTP authentication
					$mail->SMTPAuth = true;					
					//Username to use for SMTP authentication			
					$mail->Username = "estudio@financiamientoboxi.com";
					//Password to use for SMTP authentication
					$mail->Password = "Boxisleep.123$";
					//Set who the message is to be sent from
					$mail->CharSet = 'UTF-8';
					$mail->From = utf8_encode("estudio@financiamientoboxi.com");
					$mail->FromName = utf8_encode("Financiamiento Boxisleep");
					$mail->AddReplyTo('estudio@financiamientoboxi.com','No-Reply');
					$mail->Subject = utf8_encode("Financiamiento Colchon Boxisleep");
					$html = utf8_encode('<table width="100%" cellspacing="0" border="0" bgcolor="#fff"> <tbody> <tr> <td valign="top" bgcolor="#fff" align="center" class="no-padding-top-bottom-mobile" style="background-color: #fff;color:#333;"> <table cellspacing="0" cellpadding="0" border="0" bgcolor="#fff" class="container" style="max-width:600px;"> <tbody> <tr> <td bgcolor="#ffffff" align="left" class="container-padding" style="background-color: #ffffff; padding-left: 10px; padding-right: 3px; font-size: 13px; line-height: 19px; font-family: Helvetica, sans-serif; color: #333;"> <br><table width="100%" cellspacing="0" cellpadding="0" border="0" class="columns-container"> <tbody> <tr> <td class="force-col" style="padding-right: 20px;"> <table width="100%" cellspacing="0" cellpadding="0" border="0" align="left" style="padding-bottom: 10px;border:none;border-left:0px;border-right:0px;" class="col-3"> <tbody> <tr> <td align="left"> <a href="http://www.boxisleep.com"><img height="55px" border="0" width="auto" style="border:none;border-left:0px;border-right:0px;" alt="Boxisleep" src="http://www.boxisleep.com/arquivos/logo-nuevo.png" class="img-logo"></a> </td></tr></tbody> </table> </td></tr><tr> <td class="force-col"> <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="left" style="padding-bottom:0;margin-bottom:0;padding-top: 0px;" class="col-3"> <tbody> <tr> <td align="left"> <br><span style="font-size:18px;">Hola, <strong>'.$nombre.'</strong>.</span><br><div style="padding-top:3px;padding-bottom:0px;">Intentamos contactarte para confirmar a tu solicitud de financiamiento de un Boxi, pero no pudimos localizarte :( <br>Recuerda que te financiamos hasta el 70%, sin intereses, sin papeleos y con aprobación inmediata!</div></td></tr></tbody> </table> <br><br></td></tr><tr> <td style=" padding-top: 22px;"> <strong>Si aun sigues interesado, puedes responder a este correo, llamarnos al (1) 702 26 05 o escribirnos por Whatsapp al 318 261 31 22</strong> <br><br><strong>Atentamente,</strong><br><strong>Eliana López.<br>Directora de ventas<br>www.boxisleep.com</strong>.<br><br></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table>');
					$mail->Body = utf8_encode($html);
					$mail->AltBody = utf8_encode("Recuerda que te financiamos hasta el 70%, sin intereses, sin papeleos y con aprobación inmediata! Si aun sigues interesado, puedes responder a este correo, llamarnos al (1) 702 26 05 o escribirnos por Whatsapp al 318 261 31 22");
					$mail->AddAddress($email);				
					$mail->isHTML(false);
					if(!$mail->Send()) {
					  	echo "Error: " . $mail->ErrorInfo;
					  	/*exit;*/
					} else {
						echo "1";
					}
					$mail->ClearAddresses();
					// ==============  ENVIO DE CORREOS ========================== //
				}else if($estado == "interesado"){
					// ==============  ENVIO DE CORREOS ========================== //
					$mail = new PHPMailer(true);					
					//Tell PHPMailer to use SMTP
					$mail->Mailer = "smtp";
					$mail->isSMTP();
					$mail->Hello = "estudio@financiamientoboxi.com";
					//Enable SMTP debugging
					// 0 = off (for production use)
					// 1 = client messages
					// 2 = client and server messages
					$mail->SMTPDebug = 0;					
					//Ask for HTML-friendly debug output
					$mail->Debugoutput = 'html';
					//Set the hostname of the mail server
					$mail->Host = "rs02.hostingdepago.com";
					//Set the SMTP port number - likely to be 25, 465 or 587
					$mail->Port = 25;
					//Set the encryption system to use - ssl (deprecated) or tls
					$mail->SMTPSecure = 'tls';
					//Whether to use SMTP authentication
					$mail->SMTPAuth = true;					
					//Username to use for SMTP authentication			
					$mail->Username = "estudio@financiamientoboxi.com";
					//Password to use for SMTP authentication
					$mail->Password = "Boxisleep.123$";
					//Set who the message is to be sent from
					$mail->CharSet = 'UTF-8';
					$mail->From = utf8_encode("estudio@financiamientoboxi.com");
					$mail->FromName = utf8_encode("Financiamiento Boxisleep");
					$mail->AddReplyTo('estudio@financiamientoboxi.com','No-Reply');
					$mail->Subject = utf8_encode("Financiamiento Colchon Boxisleep");
					$html = utf8_encode('<table style="background: #fff;border: 1px solid rgba(45, 53, 22, 0.22);" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff" align="center"> <tbody> <tr style=" "> <td style="" width="100%" valign="top" bgcolor="#ffffff"> <table class="deviceWidth" style="margin:0 auto;width: 560px;padding: 0px 8px;" width="560" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff" align="center"> <tbody> <tr style=" "> <td bgcolor="#ffffff" valign="top" style="padding: 8px 0px;text-align: center;"> <img src="http://www.colchonesrem.co/public/BoxiMailings/piezasGenerales/logo.png" alt="" style="margin: auto;display: block;border-radius: 4px;" border="0"> </td></tr><tr style=" background: #ffffff; "> <td style="text-align: center"> <p style=" padding: 1px 0px; font-family: arial; font-weight: bold; margin: -22px 1px; margin-bottom: 3px; font-size: 27px; color: #006b66; margin-top: 12px;">&#161;HOLA</p></td></tr><tr style=" background: #ffffff; "> <td style="text-align: center"> <p style=" padding: 1px 0px; font-family: arial; font-weight: bold; margin: -22px 1px; margin-bottom: 3px; font-size: 23PX; color: #006b66; margin-top: 1px;">'.$nombre.'&#33;</p><p style=" display: block; margin-bottom: 33px; margin: 11px 9px; padding: 20px; padding-top: 0px; font-family: tahoma; font-weight: 700; color: #006b66; padding: 0px 59px; font-weight: bolder;">Hemos recibido correctamente tu solicitud de financiamiento. </p><p style=" display: block; margin-bottom: 33px; margin: 14px 9px; padding: 20px; padding-top: 0px; font-family: tahoma; font-weight: 600; color: #006b66; padding: 0px 59px;">en breve un asesor se comunicar&#225; contigo para continuar con el proceso.&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;</p></td></tr><tr style=" background: #ffffff; "> <td style="text-align: center;"> <a href="http://www.boxisleep.com/colchon-boxi/p"><img style="margin-top: 8px;display: inline-block;" src="http://www.colchonesrem.co/public/BoxiMailings/financiacion/enproceso/body1.jpg" alt="" class="fixImage"></a> </td></tr><tr style=" background: #ffffff; "> <td style="text-align: center"> <a style=" background: #ff5a5d; padding: 16px 15px; display: inline-block; font-size: 15px; font-family: arial; font-weight: bolder; border-radius: 25px; cursor: pointer; color: #ffffff; margin: 11px 0px 0px 0px; text-decoration: none; " href="http://www.boxisleep.com/colchon-boxi/p">CONOCE EL COLCH&#211;N</a> </td></tr></tbody> </table> <table class="deviceWidth" style=" /* padding: 0px; */ margin-top: 23px; " width="580" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody> <tr> <td style="" bgcolor="#fff"> <table class="deviceWidth" style="margin:0 auto;" width="580" cellspacing="0" cellpadding="10" border="0" align="center"> <tbody> <tr> <td style=" padding: 0px; "> <table class="deviceWidth" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody> <tr> <td style="font-size: 11px; color: #f1f1f1; color:#999; font-family: Arial, sans-serif; padding-bottom:20px" class="center" valign="top"> <p style=" font-family: arial; font-size: 2em; font-weight: bold; color: #2b3415; text-align: center; ">S&#205;GUENOS:</p></td></tr><tr style=" padding: 0px 23px;"> <td style="font-size: 11px;color:#999;font-family: Arial, sans-serif;text-align: center;padding-bottom: 0px;" class="center" valign="top"> <ul style=" padding: 0px; padding-bottom: 20px; display: block; width: 90%; border-bottom: 2px solid rgba(89, 104, 49, 0.58); text-align: center; margin: auto; "> <li style=" display: inline-block; "><a style=" display: block; cursor: pointer; " href="https://www.youtube.com/channel/UCCDlw1K74mFEUQsyuqonehw"><img src="http://www.colchonesrem.co/public/BoxiMailings/piezasGenerales/youtube.png" alt="Youtube" style=" width: 75%; "></a></li><li style=" display: inline-block; "><a style=" display: block; cursor: pointer; " href="https://www.facebook.com/BoxiColombia"><img src="http://www.colchonesrem.co/public/BoxiMailings/piezasGenerales/facebook.png" alt="Facebook" style=" width: 75%; "></a></li><li style="display: inline-block; "> <a style=" display: block; cursor: pointer; " href="https://twitter.com/BoxiColombia"> <img src="http://www.colchonesrem.co/public/BoxiMailings/piezasGenerales/twitter.png" alt="Twitter" style=" width: 75%; "></a> </li><li style="display: inline-block;"> <a style=" display: block; cursor: pointer; " href="https://www.instagram.com/boxicolombia/"><img src="http://www.colchonesrem.co/public/BoxiMailings/piezasGenerales/instagram.png" alt="Instagram" style=" width: 75%; "></a> </li></ul> </td></tr><tr> <td style=" text-align: center; "> <p style=" font-family: arial; font-size: 1.5em; font-weight: bold; display: block; color: #2b3415; margin-top: 14px; text-align: center; ">&#191;Necesitas ayuda&#63;</p></td></tr><tr> <td> <ul style=" display: block; font-family: arial; color: #2b3415; font-weight: 300; font-size: 0.8em; padding: 10px; text-align: center; margin-bottom: 15px; "> <li style=" list-style: none; display: inline; "><a style=" /* text-decoration: none; */ list-style: none; cursor: pointer; " href="http://www.boxisleep.com/porque-boxi/"> Nosotros </a> </li><li style=" list-style: none; display: inline; padding-left: 0.4em; border-left: 1px solid #2b3415; "><a style=" text-decoration: none; cursor: pointer; " href="http://www.boxisleep.com/preguntas-frecuentes">FAQ </a> </li><li style=" list-style: none; display: inline-block; padding-left: 0.4em; border-left: 1px solid #2b3415; margin-top: 8px; "><a style=" text-decoration: none; ">contacto@boxisleep.com </a> </li><li style=" list-style: none; display: inline-block; margin-left: 0.4em; padding-left: 0.4em; border-left: 1px solid #2b3415; /* margin-top: 8px; */ "><span>1) 702 2605 </span></li><li style=" list-style: none; display: inline-block; margin-left: 0.4em; padding-left: 0.4em; border-left: 1px solid #2b3415; margin-top: 8px; "><a>Chatea con nosotros</a></li></ul> </td></tr><tr> <td> <ul style=" display: block; font-family: arial; color: #2b3415; font-weight: 300; font-size: 0.8em; margin-top: 0; padding: 10px; text-align: center; padding-top: 0px; margin-bottom: 42px; "> <li style=" list-style: none; display: inline; font-weight: 600; ">BOXI &#174;</li><li style=" display: inline; list-style: none; margin-left: 1em; padding-left: 0.4em; border-left: 1px solid #2b3415; ">Todos los derechos reservados 2017</li></ul> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table>');
					$mail->Body = utf8_encode($html);
					$mail->AltBody = utf8_encode("​​​​​​​¡HOLA!, Hemos recibido correctamente tu solicitud de financiamiento, en breve un asesor se comunicará contigo para continuar con el proceso.​​​​​​​​​​​​​​");
					$mail->AddAddress($email);				
					$mail->isHTML(false);
					if(!$mail->Send()) {
					  	echo "Error: " . $mail->ErrorInfo;
					  	/*exit;*/
					} else {
						echo "1";
					}
					$mail->ClearAddresses();
					// ==============  ENVIO DE CORREOS ========================== //

				}
			}else {
				$mysqli->error;
			}
		}
	}
}else {
	header('Location:index.php');
}



?>