<?php

namespace Nemundo\User\Access;

use Nemundo\User\Type\UserSessionType;
use Nemundo\User\Usergroup\AbstractUsergroup;


trait UserRestrictionTrait
{

    /**
     * @var bool
     */
    public $restricted = false;

    /**
     * @var AbstractUsergroup[]
     */
    private $restrictedUsergroupList = [];


    public function addRestrictedUsergroup(AbstractUsergroup $usergroup)
    {
        $this->restrictedUsergroupList[] = $usergroup;
        return $this;
    }


    /**
     * @return AbstractUsergroup[]
     */
    public function getRestrictedUsergroupList()
    {
        return $this->restrictedUsergroupList;
    }


    public function clearRestrictedUsergroup()
    {
        $this->restrictedUsergroupList= [];
        return $this;
    }

    // checkUserAccess
    public function checkUserVisibility()
    {

        // access
        $visible = true;

        if ($this->restricted) {

            $visible = false;

            $userInformation = new UserSessionType();
            if ($userInformation->isUserLogged()) {

                foreach ($this->getRestrictedUsergroupList() as $usergroup) {

                    if ($userInformation->isMemberOfUsergroup($usergroup)) {
                        $visible = true;
                    }

                }

            }

        }

        return $visible;

    }

}