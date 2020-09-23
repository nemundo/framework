<?php

namespace Nemundo\App\Linux\Ssh;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use phpseclib\Crypt\RSA;
use phpseclib\Net\SSH2;


abstract class AbstractSsh extends AbstractBaseClass
{

    /**
     * @var SshConnection
     */
    public $connection;

    /**
     * @var SSH2
     */
    protected $ssh;


    public function __construct()
    {


        //(new Debug())->write(__FILE__);
        //(new Debug())->write(__DIR__);

        //new \Net_SSH2()

        //
        //$ssh = new Net_SSH2($host);
        //$ssh->login($login, $rsa);

        /*$path= __DIR__ . DIRECTORY_SEPARATOR . 'phpseclib';
        //(new Debug())->write($path);
        set_include_path($path);

        require_once __DIR__ . '/phpseclib/Net/SSH2.php';
        require_once __DIR__ . '/phpseclib/Net/SFTP.php';
        require_once __DIR__ . '/phpseclib/Crypt/RSA.php';*/

        $this->connection = new SshConnection();

    }


    public function __destruct()
    {
        //$this->disconnect();
    }



    protected function checkVariable() {


        if ($this->connection->host == null) {
            (new LogMessage())->writeError('Ssh Host wurde nicht definiert');
            return false;
        }

        if ($this->connection->user == null) {
            (new LogMessage())->writeError('Ssh Host wurde nicht definiert');
            return false;
        }

    }


    protected function connect()
    {

      $this->checkVariable();


        $this->ssh = new SSH2($this->connection->host);  //, $this->connection->port);

        if (!$this->ssh->isConnected()) {



            /*

            $rsa = new RSA();
            $rsa->loadKey($this->connection->rsaKey);

            if (!$this->ssh->login($this->connection->user, $rsa)) {
                (new LogMessage())->writeError('SSH Login fehlgeschlagen');
                return false;
            }*/

            if (!$this->ssh->login($this->connection->user, $this->connection->password)) {
                (new LogMessage())->writeError('SSH Login fehlgeschlagen');
                return false;
            }

            //$this->ssh->write('sudo su\n');


        }

        return true;

    }

    public function disconnect()
    {
        $this->ssh->disconnect();
    }


}