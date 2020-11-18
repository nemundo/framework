<?php

namespace Nemundo\User\Builder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Random\UniqueId;
use Nemundo\User\Data\User\User;
use Nemundo\User\Data\User\UserCount;

class UserBuilder extends AbstractBase
{


    /**
     * @var bool
     */
    public $active = true;

    /**
     * @var string
     */
    public $login;

    /**
     * @var string
     */
    public $displayName;

    /**
     * @var string
     */
    public $email;


    public function createUser()
    {

        $userId = null;


        $displayName = $this->displayName;
        if ($displayName == null) {
            $displayName = $this->login;
        }

        $count = new UserCount();
        $count->filter->andEqual($count->model->login, $this->login);
        if ($count->getCount() == 0) {

            //$userId = (new UniqueId())->getUniqueId();

            $data = new User();
            //$data->id = $userId;
            $data->ignoreIfExists = true;
            $data->active = $this->active;
            $data->login = $this->login;
            $data->email = $this->email;
            $data->displayName = $displayName;
            //$data->secureToken = (new UniqueId())->getUniqueId();
            $userId=$data->save();

        } else {


            (new LogMessage())->writeError('User already exists.');


        }

        return $userId;

    }


}