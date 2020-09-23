<?php


namespace Nemundo\User\Session;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Data\User\UserCount;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Login\Session\IsLoggedSession;
use Nemundo\User\Login\Session\UserIdSession;
use Nemundo\User\Login\UserLogout;
use Nemundo\User\Type\UserSessionType;

class UserSession extends AbstractBase
{

    public $login;

    /**
     * @var string
     */
    public $userId;

    public function __construct()
    {

        $isUserLogged = (new IsLoggedSession())->getValue();

        if ($isUserLogged) {
            $this->userId = (new UserIdSession())->getValue();
        }

    }

}