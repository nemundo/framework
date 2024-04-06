<?php

require __DIR__ . '/../../config.php';

use Nemundo\App\Mail\Message\Mail\MailMessage;

$message = new MailMessage();
$message->mailTo = '';
$message->subject ='Attachment Test';
$message->text = 'Attachment Test';
$message->addAttachment('');
$message->sendMail();