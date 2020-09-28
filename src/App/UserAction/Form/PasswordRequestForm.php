<?php

namespace Nemundo\App\UserAction\Form;


use Nemundo\App\Mail\Message\MailMessage;
use Nemundo\App\UserAction\Mail\PasswordRequestMailContainer;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\User\Type\UserItemType;

class PasswordRequestForm extends BootstrapForm
{

    /**
     * @var BootstrapTextBox
     */
    private $login;


    protected function loadContainer()
    {
        parent::loadContainer();

        $this->submitButton->label = 'Passwort anfordern';

    }


    public function getContent()
    {

        $this->login = new BootstrapTextBox($this);
        $this->login->label = 'Login';
        $this->login->name='password_request_login';
        $this->login->validation = true;
        $this->login->autofocus = true;
        //$this->login->in->addCssClass('text-uppercase');

        return parent::getContent();
    }


    public function onValidate()
    {

        $userType = (new UserItemType())->fromLogin($this->login->getValue());
        $check = $userType->exists();

        if (!$check) {
            $this->login->errorMessage = 'User nicht vorhanden';
            $this->login->showErrorMessage = true;

        }

        return $check;

    }


    protected function onSubmit()
    {

        $userType = (new UserItemType())->fromLogin($this->login->getValue());

        $passwordRequest = new PasswordRequestMailContainer();
        $passwordRequest->userId = $userType->userId;

        $mailMessage = new MailMessage();
        $mailMessage->mailTo = $userType->email;
        $mailMessage->subject = $passwordRequest->subject;
        $mailMessage->text = $passwordRequest->getContent();
        $mailMessage->sendMail();

    }

}