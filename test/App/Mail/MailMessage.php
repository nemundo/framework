<?php

require __DIR__.'/../../config.php';


$mail =new \Nemundo\App\Mail\Message\MailMessage();
$mail->mailTo= 'urs.lang@gmail.com';
$mail->subject = 'Test Mail';
$mail->text = 'Bla bla bla';
$mail->sendMail();


(new \Nemundo\App\Mail\Scheduler\MailQueueScheduler())->run();

