<?php

namespace Nemundo\App\Mail\Queue;


use Nemundo\App\Mail\Data\MailQueue\MailQueueDelete;
use Nemundo\App\Script\Type\AbstractScript;

class MailQueueDeleteScript extends AbstractScript
{

    protected function loadScript()
    {
        $this->scriptName = 'mail-queue-delete';
        $this->consoleScript = true;
    }


    public function run()
    {

        $delete = new MailQueueDelete();
        $delete->delete();

    }

}