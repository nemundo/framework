<?php

namespace Nemundo\App\UserAction\Builder;

use Nemundo\App\UserAction\Site\UserActivationSite;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Parameter\SecureTokenParameter;
use Nemundo\Web\Site\AbstractSite;

class UserActionBuilder extends AbstractBase
{

    private $userId;

    public function __construct($userId)
    {

        $this->userId = $userId;

    }



    public function getSecureTokenSite(AbstractSite $site)
    {

        $userRow = (new UserReader())->getRowById($this->userId);

        $site = clone($site);
        $site->addParameter(new SecureTokenParameter($userRow->secureToken));

        return $site;

    }





    public function getActivationSite()
    {

        $userRow = (new UserReader())->getRowById($this->userId);

        $site = clone(UserActivationSite::$site);
        $site->addParameter(new SecureTokenParameter($userRow->secureToken));

        return $site;

    }


    public function getActivationUrl()
    {

        //$url = $this->getActivationSite()->getUrlWithDomain();
        $url = $this->getActivationSite()->getUrl();
        return $url;

    }

}