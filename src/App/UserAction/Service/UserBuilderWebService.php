<?php


namespace Nemundo\App\UserAction\Service;


use Nemundo\App\Application\Usergroup\AdminUsergroup;
use Nemundo\App\Application\Usergroup\AppUsergroup;
use Nemundo\App\WebService\Service\AbstractWebService;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Request\HttpRequest;
use Nemundo\Core\Json\JsonText;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\User\Builder\UserBuilder;

class UserBuilderWebService extends AbstractWebService
{

    protected function loadService()
    {

        $this->serviceName = 'user-add';

    }


    public function onRequest()
    {

        $user = new UserBuilder();
        $user->active = true;
        $user->login = (new HttpRequest('email'))->getValue();
        $user->email = (new HttpRequest('email'))->getValue();
        $user->createUser();


        $reader = new JsonReader();
        $reader->fromText((new HttpRequest('usergroup'))->getValue());
        foreach ($reader->getData() as $usergroupId) {
          $user->addUsergroupId($usergroupId);
        }


        //$usergroupList = (new JsonReader())->fromText((new HttpRequest('usergroup'))->getValue());




        /*
        if ((new HttpRequest('editor'))->getYesNoValue()) {
            $user->addUsergroup(new AppUsergroup());
        }

        if ((new HttpRequest('admin'))->getYesNoValue()) {
            $user->addUsergroup(new AdminUsergroup());
        }*/

        $user->sendMail();
        $this->sendOkStatus();

    }


}