<?php

namespace Nemundo\App\UserAction\Service;

use Nemundo\App\Mail\Message\Mail\MailMessage;
use Nemundo\App\UserAction\Mail\PasswordRequestMailContainer;
use Nemundo\App\WebService\Service\AbstractWebService;
use Nemundo\Core\Http\Request\HttpRequest;
use Nemundo\User\Type\UserType;

class PasswordForgotWebService extends AbstractWebService
{

    protected function loadService()
    {
        $this->serviceName = 'user-password-forgot';
    }


    public function onRequest()
    {

        $login = (new HttpRequest('login'))->getValue();

        $userType = (new UserType())->fromLogin($login);
        if ($userType->existsUser()) {

            $userType = (new UserType())->fromLogin($login);

            $passwordRequest = new PasswordRequestMailContainer();
            $passwordRequest->userId = $userType->getUserId();

            $userRow = $userType->getUserRow();

            $mailMessage = new MailMessage();
            $mailMessage->mailTo = $userRow->email;
            $mailMessage->subject = $passwordRequest->subject;
            $mailMessage->text = $passwordRequest->getBodyContent();
            $mailMessage->sendMail();

            $this->sendOkStatus();

        } else {

            $this->sendStatus(10, 'User nicht vorhanden');

        }

    }

}