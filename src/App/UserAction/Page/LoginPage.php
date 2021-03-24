<?php


namespace Nemundo\App\UserAction\Page;


use Nemundo\App\UserAction\Widget\LoginWidget;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class LoginPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $widget = new LoginWidget($layout->col1);
        $widget->showForgotHyperlink = true;

        return parent::getContent();

    }

}