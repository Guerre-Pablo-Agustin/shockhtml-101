<?php
$msg = array(); // Inicializar el array para los mensajes

$name = trim($_POST['contact-name']);
$phone = trim($_POST['contact-phone']);
$email = trim($_POST['contact-email']);
$message = trim($_POST['contact-message']);

if ($name == "") {
    $msg['err'] = "El nombre no puede estar vacío.";
    $msg['field'] = "contact-name";
    $msg['code'] = FALSE;
} else if ($phone == "") {
    $msg['err'] = "El número de teléfono no puede estar vacío.";
    $msg['field'] = "contact-phone";
    $msg['code'] = FALSE;
} else if (!preg_match("/^[0-9 \\-\\+]{4,17}$/i", $phone)) {
    $msg['err'] = "Por favor, ponga un número de teléfono válido.";
    $msg['field'] = "contact-phone";
    $msg['code'] = FALSE;
} else if ($email == "") {
    $msg['err'] = "El correo electrónico no puede estar vacío.";
    $msg['field'] = "contact-email";
    $msg['code'] = FALSE;
} else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $msg['err'] = "Por favor, introduzca una dirección de correo electrónico válida.";
    $msg['field'] = "contact-email";
    $msg['code'] = FALSE;
} else if ($message == "") {
    $msg['err'] = "El mensaje no puede estar vacío.";
    $msg['field'] = "contact-message";
    $msg['code'] = FALSE;
} else {
    $to = 'destinatario@example.com'; // Cambiar esto por la dirección de correo del destinatario
    $subject = 'Consulta de contacto de ' . $name;
    $_message = '<html><head></head><body>';
    $_message .= '<p>Nombre: ' . $name . '</p>';
    $_message .= '<p>Teléfono: ' . $phone . '</p>';
    $_message .= '<p>Email: ' . $email . '</p>';
    $_message .= '<p>Mensaje: ' . $message . '</p>';
    $_message .= '</body></html>';

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: Papr <guerre.pablo.agustin@gmail.com>' . "\r\n";

    // Enviar el correo y verificar el resultado
    if (mail($to, $subject, $_message, $headers)) {
        $msg['success'] = "El correo electrónico ha sido enviado con éxito.";
        $msg['code'] = TRUE;
    } else {
        $msg['err'] = "Hubo un error al enviar el correo. Por favor, inténtalo de nuevo más tarde.";
        $msg['code'] = FALSE;
    }
}

echo json_encode($msg);
?>