<?php
/**
 * Here personal email settings are applied.
 * 
 * @package Shock
 * @since 1.0.1
 */

/*----------------------------------------------
This data will only be displayed in your inbox when an email arrives.
----------------------------------------------*/

$MessageTitle   = 'Nuevo mensaje de contacto XD';   // Enter a title for the email that will arrive in your inbox.
$RecipientEmail = 'guerre.pablo.agustin@gmail.com'; // Enter the your email address that will receive form messages.
$RecipientName  = 'Pablo Agustin Gerreño';             // Enter your name.
$ReplyToEmail   = 'no-reply@email.com';    // Enter the email address to which the reply message is sent.

/*----------------------------------------------
Change this only if you change the name of these fields in the HTML form.
----------------------------------------------*/

$FieldSubject = 'contact-name'; // Subject field name attribute.
$FieldEmail   = 'contact-email';   // Email field name attribute.

/*----------------------------------------------
Global variables, don't change anything here.
----------------------------------------------*/
global $RecipientEmail, $RecipientName, $ReplyToEmail, $FieldSubject, $FieldEmail;