<?php

namespace Nemundo\App\Translation\Page;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\Translation\Com\Admin\LanguageAdmin;
use Nemundo\App\Translation\Com\Form\TranslationImportForm;
use Nemundo\App\Translation\Site\Export\TranslationExportSite;
use Nemundo\App\Translation\Template\TranslationTemplate;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;


class LanguagePage extends TranslationTemplate
{
    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        new LanguageAdmin($layout->col1);

        $btn = new AdminSiteButton($layout->col2);
        $btn->site = TranslationExportSite::$site;

        $widget = new AdminWidget($layout->col2);
        $widget->widgetTitle = 'Translation Import';
        new TranslationImportForm($widget);

        return parent::getContent();

    }

}