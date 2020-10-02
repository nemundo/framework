<?php

namespace Nemundo\App\UserAction\Form;


use Nemundo\Com\FormBuilder\AbstractFormBuilder;
use Nemundo\User\Com\ListBox\UserListBox;
use Nemundo\User\Login\UserLogin;
use Nemundo\User\Type\UserItemType;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Core\Http\Url\UrlReferer;

class UserChangeForm extends AbstractFormBuilder
{

    /**
     * @var UserListBox
     */
    private $userListBox;

    public function getContent()
    {

        $this->userListBox =new UserListBox($this);
        $this->userListBox->submitOnChange = true;
        $this->userListBox->emptyValueAsDefault = false;
        //$this->userListBox->filter->andEqual($this->userListBox->model->active, true);
        $this->userListBox->value = (new UserSessionType())->userId;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $userType = new UserItemType($this->userListBox->getValue());

        $userLogin = new UserLogin();
        $userLogin->login = $userType->login;
        $userLogin->password = $userType->login;
        $userLogin->passwordVerification = false;
        $userLogin->loginUser();

        (new UrlReferer())->redirect();

    }

}