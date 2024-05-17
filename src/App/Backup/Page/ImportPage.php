<?php

namespace Nemundo\App\Backup\Page;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\App\Backup\Com\Form\BackupImportForm;
use Nemundo\App\Backup\Com\Tab\BackupTab;
use Nemundo\App\Backup\Parameter\BackupParameter;
use Nemundo\Com\Template\AbstractTemplateDocument;

class ImportPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new BackupTab($layout);

        $form = new BackupImportForm($layout);
        $form->backupId = (new BackupParameter())->getValue();


        return parent::getContent();
    }
}