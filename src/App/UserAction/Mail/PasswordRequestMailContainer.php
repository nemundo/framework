<?php

namespace Nemundo\App\UserAction\Mail;


use Nemundo\App\UserAction\Site\UserActivationSite;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\User\Login\Parameter\SecureTokenUrlParameter;
use Nemundo\User\Mail\AbstractUserLoginMailContainer;
use Nemundo\User\Type\UserItemType;

class PasswordRequestMailContainer extends AbstractUserLoginMailContainer
{


    protected function loadMailContainer()
    {
        $this->subject = 'Passwort anfordern';
    }


    public function getContent()
    {

        $userItem = new UserItemType($this->userId);

        $p = new Paragraph($this);
        $p->content = 'Setzen sie das Passwort für das Login: ' . $userItem->login;

        $site = UserActivationSite::$site;
        $site->addParameter(new SecureTokenUrlParameter($userItem->secureToken));
        $url = $site->getUrlWithDomain();

        $hyperlink = new UrlHyperlink($this);
        $hyperlink->content = 'Passwort ändern';
        $hyperlink->url = $url;

        return parent::getContent();

    }

}