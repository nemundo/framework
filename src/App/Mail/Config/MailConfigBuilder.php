<?php

namespace Nemundo\App\Mail\Config;

use Nemundo\App\Mail\Data\MailServer\MailServer;
use Nemundo\App\Mail\Data\MailServer\MailServerCount;
use Nemundo\Core\Base\AbstractBase;

class MailConfigBuilder extends AbstractBase
{


    public $host;

    public $port;

    /**
     * @var bool
     */
    public $authentication = true;

    public $user;

    public $password;

    public $mailAddress;

    public $mailText;


    public function saveConfig()
    {

        $count = new MailServerCount();
        if ($count->getCount() == 0) {


        $data = new MailServer();
        $data->active = true;
        $data->host = $this->host;
        $data->port = $this->port;
        $data->authentication = $this->authentication;
        $data->user = $this->user;
        $data->password = $this->password;
        $data->mailAddress = $this->mailAddress;
        $data->mailText = $this->mailText;
        $data->save();

        }

    }

}