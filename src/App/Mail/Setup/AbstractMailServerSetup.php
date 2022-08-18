<?php

namespace Nemundo\App\Mail\Setup;

use Nemundo\App\Mail\Data\MailServer\MailServer;
use Nemundo\Core\Base\AbstractBase;


// AbstractMailServerConfig
// MailServerSetup


// AbstractMailConfig
abstract class AbstractMailServerSetup extends AbstractBase
{

    protected $host;

    protected $port;

    protected $user;

    protected $password;

    protected $mailAddress;

    protected $mailText;

    abstract protected function loadSetup();

    public function __construct()
    {

        $this->loadSetup();

    }


    // saveConfig
    // extern in setup class
    public function save()
    {

        $data = new MailServer();
        $data->updateOnDuplicate = true;
        $data->active = true;
        $data->host = $this->host;
        $data->port = $this->port;
        $data->authentication = true;
        $data->user = $this->user;
        $data->password = $this->password;
        $data->mailAddress = $this->mailAddress;
        $data->mailText = $this->mailText;
        $data->save();

    }

}