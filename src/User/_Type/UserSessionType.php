<?php

namespace Nemundo\User\Type;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Data\User\UserCount;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Data\User\UserRow;
use Nemundo\User\Data\UserUsergroup\UserUsergroupReader;
use Nemundo\User\Login\Session\IsLoggedSession;
use Nemundo\User\Login\Session\UserIdSession;
use Nemundo\User\Login\UserLogout;
use Nemundo\User\Usergroup\AbstractUsergroup;


// UserSession
class UserSessionType extends AbstractBase  // UserItemType
{

    /**
     * @var UserRow
     */
    private static $userRow;

    private static $usergroupList;

    protected $userId;

    public function __construct()
    {

        //parent::__construct();
        $this->fromLoginSession();

    }


    public function fromLoginSession()
    {

        $isUserLogged = (new IsLoggedSession())->getValue();

        if ($isUserLogged) {
            $this->userId = (new UserIdSession())->getValue();

            if (UserSessionType::$userRow == null) {

                $count = new UserCount();
                $count->filter->andEqual($count->model->id, $this->userId);
                if ($count->getCount() == 1) {
                    UserSessionType::$userRow = (new UserReader())->getRowById($this->userId);
                } else {
                    (new UserLogout())->logout();
                    return;
                }

            }

            if (UserSessionType::$userRow->active) {
                $this->active = UserSessionType::$userRow->active;
                $this->login = UserSessionType::$userRow->login;
                $this->email = UserSessionType::$userRow->email;
                $this->displayName = UserSessionType::$userRow->displayName;
                $this->secureToken = UserSessionType::$userRow->secureToken;
            } else {
                (new UserLogout())->logout();
            }

        }

    }


    public function isUserLogged()
    {

        $isUserLogged = (new IsLoggedSession())->getValue();
        return $isUserLogged;

    }


    public function isMemberOfUsergroup(AbstractUsergroup $usergroup)
    {

        if (UserSessionType::$usergroupList == null) {

            UserSessionType::$usergroupList = [];

            $reader = new UserUsergroupReader();
            $reader->filter->andEqual($reader->model->userId, $this->userId);
            foreach ($reader->getData() as $row) {
                UserSessionType::$usergroupList[] = $row->usergroupId;
            }
        }

        $returnValue = false;
        if (in_array($usergroup->usergroupId, UserSessionType::$usergroupList)) {
            $returnValue = true;
        }

        return $returnValue;

    }


}