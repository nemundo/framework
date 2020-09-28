<?php

namespace Nemundo\User\Script\AdminUser;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Console\ConsoleInput;
use Nemundo\User\Builder\AdminUserBuilder;


class AdminUserEnable extends AbstractConsoleScript
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

        $builder = new AdminUserBuilder();
        $builder->password = $password;
        $builder->createAdminUser();

    }

}