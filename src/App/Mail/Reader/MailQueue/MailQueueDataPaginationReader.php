<?php

namespace Nemundo\App\Mail\Reader\MailQueue;

use Nemundo\App\Mail\Data\MailQueue\MailQueuePaginationReader;

class MailQueueDataPaginationReader extends MailQueuePaginationReader
{

    use MailQueueDataTrait;

    public function __construct()
    {

        parent::__construct();
        $this->loadModel();

    }


}