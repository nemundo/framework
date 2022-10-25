<?php

namespace Nemundo\App\Dataset\Page;

use Nemundo\Admin\Com\Html\AdminUnorderedList;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Dataset\Reader\DatasetDataReader;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Com\Template\AbstractTemplateDocument;

class DataSourcePage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = 'Data Source';


        $list = new AdminUnorderedList($layout);

        $reader = new DatasetDataReader();
        foreach ($reader->getData() as $datasetRow) {

            $hyperlink = new UrlHyperlink($list);
            $hyperlink->openNewWindow = true;
            $hyperlink->content = $datasetRow->dataset . ', ' . $datasetRow->organisation->organisation;
            $hyperlink->url = $datasetRow->url;

        }

        return parent::getContent();

    }
}