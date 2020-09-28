<?php

namespace Nemundo\App\UserAction\Form;


use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapPasswordTextBox;
use Nemundo\User\Login\Session\LoginNameSession;
use Nemundo\User\Login\UserLogin;
use Nemundo\User\Type\UserSessionType;

class PasswordChangeForm extends AbstractAdminForm  // BootstrapForm
{

    /**
     * @var BootstrapPasswordTextBox
     */
    private $password;

    public function getContent()
    {

        $this->password = new BootstrapPasswordTextBox($this);
        $this->password->label = 'Neues Passwort';
        $this->password->name = 'password';
        $this->password->validation = true;
        $this->password->autofocus = true;

        $this->submitButton->label = 'Passwort ändern';

        return parent::getContent();
    }


    protected function onSubmit()
    {

        $login = (new LoginNameSession())->getValue();
        $password = $this->password->getValue();

        $userType = new UserSessionType();
        $userType->changePassword($password);

        /*
        $changePassword = new PasswordChange();
        $changePassword->login =$login;
        $changePassword->password = $password;
        $changePassword->changePassword();*/

        $userLogin = new UserLogin();
        $userLogin->login = $login;
        $userLogin->password = $password;
        $userLogin->loginUser();

    }

}