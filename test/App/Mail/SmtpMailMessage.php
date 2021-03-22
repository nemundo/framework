<?php

require __DIR__.'/../../config.php';


use Nemundo\App\Mail\Connection\SmtpConnection;
use Nemundo\App\Mail\MailConfig;
use Nemundo\App\Mail\Message\SmtpMailMessage;
use Nemundo\Project\Config\ProjectConfigReader;

/*
MailConfig::$mailConnection = new SmtpConnection();
MailConfig::$mailConnection->host = ProjectConfigReader::$configReader->getValue('smtp_host');
MailConfig::$mailConnection->authentication = ProjectConfigReader::$configReader->getValue('smtp_authentication');
MailConfig::$mailConnection->user = ProjectConfigReader::$configReader->getValue('smtp_user');
MailConfig::$mailConnection->password = ProjectConfigReader::$configReader->getValue('smtp_password');
MailConfig::$mailConnection->port = ProjectConfigReader::$configReader->getValue('smtp_port');

MailConfig::$defaultMailFrom = ProjectConfigReader::$configReader->getValue('default_mail_address');
MailConfig::$defaultMailFromText = ProjectConfigReader::$configReader->getValue('default_mail_text');
*/


(new \Nemundo\App\Mail\Config\MailConfigLoader())->loadConfig();


$mail = new SmtpMailMessage();
$mail->addTo('urs.lang@gmail.com');
$mail->subject = 'Test Mail';
$mail->text = 'Bla bla bla';
$mail->sendMail();

