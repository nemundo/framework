<?php


namespace Nemundo\Package\Mdb;


use Nemundo\Com\Package\AbstractPackage;
use Nemundo\FrameworkProject;

class MdbPackage extends AbstractPackage
{

    protected function loadPackage()
    {

        $this->project=new FrameworkProject();
        $this->packageName='mdb';

        $this->addCss('css/mdb.min.css');
        //$this->addJs('js/mdb.min.js');

        // TODO: Implement loadPackage() method.
    }

}