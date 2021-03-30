<?php

namespace NemundoTest\Package\Bootstrap\Form;

//require '../../../config.php';


use Nemundo\Web\Site\AbstractSite;

class BootstrapFormTestSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title='BootstrapFormTest';
        $this->url='BootstrapFormTest';
        // TODO: Implement loadSite() method.
    }


    public function loadContent()
    {

        $html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

        new BootstrapTestForm($html);
        //new \TestForm($html);

        $html->render();

        // TODO: Implement loadContent() method.
    }

}




