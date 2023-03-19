<?php

namespace Nemundo\App\Dataset\Page;

use Nemundo\Admin\Com\Breadcrumb\AdminBreadcrumb;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Dataset\Data\Dataset\DatasetReader;
use Nemundo\App\Dataset\Parameter\DatasetParameter;
use Nemundo\App\Dataset\Site\DatasetSite;
use Nemundo\Com\Template\AbstractTemplateDocument;

class DataPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);


        $breadcrumb = new AdminBreadcrumb($layout);
        $breadcrumb->addSite(DatasetSite::$site);




        $datasetRow = (new DatasetReader())->getRowById((new DatasetParameter())->getValue());

        $title = new AdminTitle($layout);
        $title->content = $datasetRow->dataset;

        $breadcrumb->addText($datasetRow->dataset);

        $container = $datasetRow->getDataset()->getDataContainer();

        $layout->addContainer($container);





        return parent::getContent();

    }
}