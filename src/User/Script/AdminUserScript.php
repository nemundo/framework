<?php

namespace Nemundo\User\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Console\ConsoleInput;
use Nemundo\User\Builder\AdminUserBuilder;
use Nemundo\User\Builder\UserBuilder;
use Nemundo\User\Type\UserItemType;


class AdminUserScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'admin-user-enable';
    }


    public function run()
    {

        $input = new ConsoleInput();
        $input->message = 'Password';
        $password = $input->getValue();


        $user = new UserBuilder();  //ItemType();
        $user->login = 'admin';
        $user->email = 'noreply@noreply.com';
        $user->createUser();

        $user->changePassword($password);
        $user->addAllUsergroup();


        /*$builder = new AdminUserBuilder();
        $builder->password = $password;
        $builder->createAdminUser();*/

    }

}