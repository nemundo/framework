<?php

namespace Nemundo\User\Type;


use Nemundo\App\Mail\Message\MailMessage;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Random\UniqueId;
use Nemundo\User\Data\User\User;
use Nemundo\User\Data\User\UserCount;
use Nemundo\User\Data\User\UserDelete;
use Nemundo\User\Data\User\UserId;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Data\User\UserRow;
use Nemundo\User\Data\User\UserUpdate;
use Nemundo\User\Data\Usergroup\UsergroupCount;
use Nemundo\User\Data\Usergroup\UsergroupReader;
use Nemundo\User\Data\Usergroup\UsergroupRow;
use Nemundo\User\Data\UserUsergroup\UserUsergroup;
use Nemundo\User\Data\UserUsergroup\UserUsergroupDelete;
use Nemundo\User\Data\UserUsergroup\UserUsergroupReader;
use Nemundo\User\Login\Parameter\SecureTokenUrlParameter;
use Nemundo\User\Mail\AbstractUserLoginMailContainer;
use Nemundo\User\Mail\UserLoginMailContainer;
use Nemundo\User\Password\PasswordHash;
use Nemundo\User\Usergroup\AbstractUsergroup;


// trennen nach UserItemBuilder

class UserItemType extends AbstractBaseClass
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

    /**
     * @var string
     */
    public $userId;

    /**
     * @var string
     */
    public $secureToken;

    public function __construct($userId = null)
    {

        $this->userId = $userId;
        $this->loadData();

    }


    public function fromUserRow(UserRow $userRow)
    {


        $this->active = $userRow->active;
        $this->login = $userRow->login;
        $this->email = $userRow->email;
        $this->displayName = $userRow->displayName;
        $this->secureToken = $userRow->secureToken;

    }


    protected function loadData()
    {

        if ($this->userId !== null) {

            $userReader = new UserReader();
            $userReader->filter->andEqual($userReader->model->id, $this->userId);
            foreach ($userReader->getData() as $userRow) {
                $this->fromUserRow($userRow);
            }

        } else {
            //$this->userId = (new UniqueId())->getUniqueId();
        }

    }


    public function fromLogin($login)
    {

        if ($login !== null) {
            $id = new UserId();
            $id->filter->andEqual($id->model->login, $login);
            $this->userId = $id->getId();

            if (!$this->userId == '') {
                $this->loadData();
            } else {
                // (new LogMessage())->writeError('Login not found');
            }

        }

        return $this;

    }


    public function fromLoginOrEmail($login)
    {

        $id = new UserId();
        $id->filter->orEqual($id->model->login, $login);
        $id->filter->orEqual($id->model->email, $login);
        $this->userId = $id->getId();

        if (!$this->userId == '') {
            $this->loadData();
        }

        return $this;

    }


    public function fromSecureTokenParameter()
    {

        $secureToken = (new SecureTokenUrlParameter())->getValue();

        $count = new UserCount();
        //$count->filter->andEqual($count->model->login, $login);
        $count->filter->andEqual($count->model->secureToken, $secureToken);
        if ($count->getCount() == 0) {
            (new LogMessage())->writeError('Invalid Secure Token');
            exit;
        }

        $id = new UserId();
        //$count->filter->andEqual($count->model->login, $login);
        $id->filter->andEqual($count->model->secureToken, $secureToken);
        $this->userId = $id->getId();

        $this->loadData();

        return $this;


    }


    public function addUsergroup(AbstractUsergroup $usergroup)
    {

        $count = new UsergroupCount();
        $count->filter->andEqual($count->model->id, $usergroup->usergroupId);
        if ($count->getCount() == 1) {

            $data = new UserUsergroup();
            $data->ignoreIfExists = true;
            $data->userId = $this->userId;
            $data->usergroupId = $usergroup->usergroupId;
            $data->save();

        } else {
            (new LogMessage())->writeError('Usergroup does not exist. Usergroup Id: ' . $usergroup->usergroupId);
        }

        return $this;

    }


    public function addAllUsergroup()
    {

        $usergroupReader = new UsergroupReader();
        foreach ($usergroupReader->getData() as $usergroupRow) {

            $usergroup = new \Nemundo\User\Usergroup\Usergroup();
            $usergroup->usergroupId = $usergroupRow->id;

            $this->addUsergroup($usergroup);
        }


    }


    public function removeUsergroup(AbstractUsergroup $usergroup)
    {

        $delete = new UserUsergroupDelete();
        $delete->filter->andEqual($delete->model->userId, $this->userId);
        $delete->filter->andEqual($delete->model->usergroupId, $usergroup->usergroupId);
        $delete->delete();

        return $this;

    }


    public function removeAllUsergroup()
    {

        $delete = new UserUsergroupDelete();
        $delete->filter->andEqual($delete->model->userId, $this->userId);
        $delete->delete();

        return $this;

    }


    /**
     * @return UsergroupRow[]
     */
    public function getUsergroup()
    {

        $reader = new UserUsergroupReader();
        $reader->model->loadUsergroup();
        //$reader->model->usergroup->loadApplication();
        $reader->filter->andEqual($reader->model->userId, $this->userId);

        $list = [];
        foreach ($reader->getData() as $row) {
            $list[] = $row->usergroup;
        }

        return $list;

    }


    public function isMemberOfUsergroup(AbstractUsergroup $usergroup)
    {

        $usergroupList = [];

        $reader = new UserUsergroupReader();
        $reader->filter->andEqual($reader->model->userId, $this->userId);
        foreach ($reader->getData() as $row) {
            $usergroupList[] = $row->usergroupId;
        }

        $returnValue = false;
        if (in_array($usergroup->usergroupId, $usergroupList)) {
            $returnValue = true;
        }

        return $returnValue;

    }


    public function changePassword($password)
    {

        $this->changePasswordByHash((new PasswordHash($password))->getHashPassword());
        return $this;
    }


    public function changePasswordByHash($passwordHash)
    {


        $update = new UserUpdate();
        $update->password = $passwordHash;
        $update->updateById($this->userId);

        return $this;
    }


    public function disableUser()
    {

        $update = new UserUpdate();
        $update->active = false;
        $update->updateById($this->userId);

    }


    public function enableUser()
    {

        $update = new UserUpdate();
        $update->active = true;
        $update->updateById($this->userId);

    }


    public function createUser()
    {

        $displayName = $this->displayName;
        if ($displayName == null) {
            $displayName = $this->login;
        }

        $count = new UserCount();
        $count->filter->andEqual($count->model->login, $this->login);
        if ($count->getCount() == 0) {

            $data = new User();
            //$data->id = $this->userId;
            $data->ignoreIfExists = true;
            $data->active = $this->active;
            $data->login = $this->login;
            $data->email = $this->email;
            $data->displayName = $displayName;
            $data->secureToken = (new UniqueId())->getUniqueId();
            $this->userId= $data->save();

        } else {

            $id = new UserId();
            $id->filter->andEqual($id->model->login, $this->login);
            $this->userId = $id->getId();

            $update = new UserUpdate();
            $update->active = $this->active;
            $update->email = $this->email;
            $update->displayName = $displayName;
            $update->updateById($this->userId);

        }

        return $this->userId;

    }


    public function deleteUser()
    {

        $delete = new UserUsergroupDelete();
        $delete->filter->andEqual($delete->model->userId, $this->userId);
        $delete->delete();

        (new UserDelete())->deleteById($this->userId);

        return $this;

    }


    public function exists()
    {

        $value = false;

        $count = new UserCount();
        $count->filter->andEqual($count->model->login, $this->login);
        if ($count->getCount() == 1) {
            $value = true;
        }

        return $value;

    }


    public function sendMail(AbstractUserLoginMailContainer $mailContainer = null)
    {

        if ($mailContainer == null) {
            $mailContainer = new UserLoginMailContainer();
        }

        $mailContainer->userId = $this->userId;

        $mailMessage = new MailMessage();
        $mailMessage->mailTo = $this->email;
        $mailMessage->subject = $mailContainer->subject;
        $mailMessage->text = $mailContainer->getBodyContent();
        $mailMessage->sendMail();

    }


    public function getLabel()
    {

        $label = $this->login . ' (' . $this->email . ')';

        return $label;

    }

}