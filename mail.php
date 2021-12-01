<?php 
require_once __DIR__ . '/vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('	smtp.mailtrap.io', 2525))
  ->setUsername('fc7f0b9853ab98')
  ->setPassword('b03d954ae75067')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['arush3339@gmail.com' => 'Arush Sharma'])
  ->setTo(['jpss.hata@gmail.com'])
  ->setBody('Here is the message itself')
  ;

// Send the message
$result = $mailer->send($message);



 ?>