<?php


namespace Nemundo\App\Linux\Cmd;


use Nemundo\Core\Debug\Debug;

class UserCreatorCmd extends AbstractCmd
{

    public $user;

    public $password;

    public function getCommandList()
    {

        //$this->addCommandLine('useradd '.$this->user.' -p '.crypt($this->password,CRYPT_SHA512));
        $this->addCommandLine('useradd '.$this->user);
        $this->addCommandLine('yes '.$this->password.' | sudo passwd '.$this->user);

        /*$this->addCommandLine('echo "PASSWORD CHANGE: '.$this->user.'"');
        $this->addCommandLine('passwd '.$this->user);*/

        //sudo yes aaa | sudo passwd my1_nemundo_ch


        return parent::getCommandList();

    }

}