<?php

namespace Nemundo\App\Mail\Reader\MailQueue;

trait MailQueueDataTrait
{

    protected function loadModel()
    {

        $this->model->loadMailServer();

    }

}