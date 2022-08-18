<?php


namespace Nemundo\App\Linux\Cmd;


class AptUpdateCmd extends AbstractCmd
{

    public function getCommandList()
    {

/*
        apt-get update
apt-get upgrade
  */
        //$cmd = 'sudo apt update'."\r\n".'sudo apt upgrade -y';
        /*$this->addCommandLine('apt update');
        $this->addCommandLine('apt upgrade -y');*/


        $this->addCommandLine('apt-get update');
        $this->addCommandLine('apt-get upgrade -y');

        return parent::getCommandList();

    }

}