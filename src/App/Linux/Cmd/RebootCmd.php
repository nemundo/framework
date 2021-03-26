<?php


namespace Nemundo\App\Linux\Cmd;


class RebootCmd extends AbstractCmd
{


    protected function loadCmd()
    {

        $this->label = 'Reboot';
        $this->command = 'sudo shutdown -r now';


        // TODO: Implement loadCmd() method.
    }

    /*
    public function getCmd()
    {

        $this->label = 'Reboot';
        $cmd = 'sudo shutdown -r now';
        return $cmd;

    }*/

}