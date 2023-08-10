<?php
/**
 * This file will require PHPMailer functions and send emails.
 * 
 * @package Shock
 * @since 1.0.1
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'config.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ( ! empty( $_POST ) ) {

	$mail = new PHPMailer();
	
	/*----------------------------------------------
	Here you can set a Gmail or other email to send via SMTP. 
	Read more: https://github.com/PHPMailer/PHPMailer
    $mail->SMTPDebug = 2;*/
	$mail->isSMTP();
	$mail->Host       = 'smtp.gmail.com';
	$mail->SMTPAuth   = true;
	$mail->SMTPSecure = 'tls';
	$mail->Username   = 'guerre.pablo.agustin@gmail.com';
	$mail->Password   = 'ufrhmjbhbmcvxpjh';
	$mail->Port       = 587;

	if ( isset( $_POST[$FieldSubject] ) ) {
		$mail->Subject = $_POST[$FieldSubject];
	}

	if ( isset( $_POST[$FieldEmail] ) ) {
		$mail->setFrom( $_POST[$FieldEmail] );
	}

	$mail->addReplyTo( $ReplyToEmail );
	$mail->addAddress( $RecipientEmail, $RecipientName );
	$mail->isHTML( true );

	$mail->Body = '<h3>' . $MessageTitle . '</h3>';
 
	// Takes the fields and adds them to the body of the email.
	foreach( $_POST as $key => $value ) {
		$mail->Body .= '<p><b>' . str_replace( '-', ' ', ucfirst( $key ) ) . '</b>: ' .  $value . '</p>';
	}

	// Checks if the email was sent
	if ( ! $mail->send() ) {
		$response = array(
			'status' => 'error',
			'debug'  => $mail->ErrorInfo
		);

	} else {
		echo "<script>alert('Mensaje enviado con éxito');</script>";
		
        header("Location: pagina_de_redireccion.php");
        
        $response = array(
			'status' => 'success'
        );
    }

	print_r( json_encode( $response ) );
}

exit;
