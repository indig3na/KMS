<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller;
use W\Controller\Controller;
use PHPMailer;

/**
 * Description of Mailer
 *
 * @author Etudiant
 */
class MailerController extends Controller{
    
    public function emailSent ($email,$mailContent){

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.googlemail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'formationwf3@gmail.com';                 // SMTP username
	$mail->Password = 'formationwf3123';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;  
	$mail->setLanguage('fr', '/optional/path/to/language/directory/');                                  // TCP port to connect to

	$mail->setFrom('formationwf3@gmail.com', 'formationwf3');
	$mail->addAddress($email);     // Add a recipient
	// $mail->addAddress('ellen@example.com');               // Name is optional
	// $mail->addReplyTo('info@example.com', 'Information');
	// $mail->addCC('cc@example.com');
	// $mail->addBCC('bcc@example.com');

	// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	 $mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Reinitialisation de l\'email';
	$mail->Body    = $mailContent;
	if(!$mail->send()) {
	    $success=false;
	} 
	/*else {
	    echo 'Message has been sent'; 
	}*/

	// return $success;
    }

}
