<?php


namespace Nemundo\App\UserAction\Service;


use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Data\UserUsergroup\UserUsergroupReader;

// UserSearchService
class UserListServiceRequest extends AbstractServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'user-list';
    }


    public function onRequest()
    {


        $userReader = new UserReader();  // new UserPaginationReader();
        $userReader->addOrder($userReader->model->login);


        /*        if ($q !== '') {
                    $userReader->filter->orContains($userReader->model->login, $text->getValue());
                }*/


        foreach ($userReader->getData() as $userRow) {

            $row = [];
            $row['user_id'] = $userRow->id;
            $row['login'] = $userRow->login;

            $userUsergroupReader = new UserUsergroupReader();
            $userUsergroupReader->model->loadUser();
            $userUsergroupReader->model->loadUsergroup();
            $userUsergroupReader->filter->andEqual($userUsergroupReader->model->userId, $userRow->id);

            $usergroup = new TextDirectory();
            foreach ($userUsergroupReader->getData() as $userUsergroupRow) {
                $usergroup->addValue($userUsergroupRow->usergroup->usergroup);
            }
            $row['usergroup'] = $usergroup->getTextWithSeperator();

            $this->addRow($row);

        }

    }

}