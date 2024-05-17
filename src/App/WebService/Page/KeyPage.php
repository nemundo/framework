<?php

namespace Nemundo\App\WebService\Page;

use Nemundo\Admin\Com\Copy\AdminCopyTextBox;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\App\WebService\Com\Form\KeyForm;
use Nemundo\App\WebService\Com\Tab\WebServiceTab;
use Nemundo\App\WebService\Data\Key\KeyReader;
use Nemundo\App\WebService\Data\ServiceRequest\ServiceRequestReader;
use Nemundo\App\WebService\Site\ServiceRequestSite;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Web\Parameter\UrlParameter;

class KeyPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new WebServiceTab($layout);

        new KeyForm($layout);


        $table = new AdminTable($layout);

        $reader = new KeyReader();


        $header = new AdminTableHeader($table);
        $header->addText($reader->model->key->label);
        $header->addEmpty();

        foreach ($reader->getData() as $serviceRequestRow) {

            $row = new AdminTableRow($table);
            //$row->addText($serviceRequestRow->key);

            $txt = new AdminCopyTextBox($row);
            $txt->value = $serviceRequestRow->key;

        }


        return parent::getContent();
    }
}