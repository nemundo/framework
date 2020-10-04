<?php


namespace Nemundo\App\UserAction\Widget;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\UserAction\Form\LoginForm;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Web\Site\AbstractSite;

class LoginWidget extends AdminWidget
{

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    public function getContent()
    {

        if ((new UserSessionType())->isUserLogged()) {
            $this->visible = false;
        }

        $this->widgetTitle = 'Login';

        $form = new LoginForm($this);
        $form->showForgotHyperlink = false;  //true;
        $form->showRegisterHyperlink = false;
        $form->autofocus = false;
        $form->redirectSite = $this->redirectSite;

        return parent::getContent();

    }

}