<?php

namespace Nemundo\App\Mail\Reader\MailQueue;

use Nemundo\App\Mail\Data\MailQueue\MailQueueReader;

class MailQueueDataReader extends MailQueueReader
{

    use MailQueueDataTrait;

    public function __construct()
    {

        parent::__construct();
        $this->loadModel();

    }

}