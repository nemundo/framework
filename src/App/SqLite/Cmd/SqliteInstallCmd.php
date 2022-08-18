<?php


namespace Nemundo\App\SqLite\Cmd;


use Nemundo\App\Linux\Cmd\AbstractCmd;

class SqliteInstallCmd extends AbstractCmd
{

    public function getCommandList()
    {

        $this->addCommandLine('apt-get install php-sqlite3');
        return parent::getCommandList();

    }

}