<?php

namespace Nemundo\App\Mail\Site;


use Nemundo\App\Mail\Form\TestMailForm;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

// TestMailSite
class MailTestSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Test Mail';
        $this->url = 'test-mail';
        $this->menuActive = false;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        new TestMailForm($page);

        $page->render();

    }


}