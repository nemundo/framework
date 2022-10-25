<?php

namespace Nemundo\App\Dataset\Page;

use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Dataset\Com\ListBox\CategoryListBox;
use Nemundo\App\Dataset\Com\ListBox\OrganisationListBox;
use Nemundo\App\Dataset\Data\Dataset\DatasetReader;
use Nemundo\App\Dataset\Type\AbstractDataset;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Com\Template\AbstractTemplateDocument;

class DatasetPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = 'Dataset';


        $search = new AdminSearchForm($layout);

        $category = new CategoryListBox($search);
        $category->submitOnChange = true;
        $category->searchMode = true;

        $organisation = new OrganisationListBox($search);
        $organisation->submitOnChange = true;
        $organisation->searchMode = true;


        $table = new AdminTable($layout);

        $reader = new DatasetReader();
        $reader->model->loadCategory();
        $reader->model->loadOrganisation();

        if ($category->hasValue()) {
            $reader->filter->andEqual($reader->model->categoryId, $category->getValue());
        }

        if ($organisation->hasValue()) {
            $reader->filter->andEqual($reader->model->organisationId, $organisation->getValue());
        }


        $header = new AdminTableHeader($table);
        $header->addText($reader->model->dataset->label);
        $header->addText($reader->model->description->label);
        $header->addText($reader->model->licence->label);
        $header->addText($reader->model->organisation->label);
        $header->addText($reader->model->category->label);
        //$header->addText('Last Update');

        $header->addEmpty();

        foreach ($reader->getData() as $datasetRow) {

            $row = new AdminTableRow($table);

            $hyperlink=new UrlHyperlink($row);
            $hyperlink->content=$datasetRow->dataset;
            $hyperlink->url=$datasetRow->url;
            $hyperlink->openNewWindow=true;

            //$row->addText($datasetRow->dataset);
            $row->addText($datasetRow->description);
            $row->addText($datasetRow->licence);
            $row->addText($datasetRow->organisation->organisation);
            $row->addText($datasetRow->category->category);

            $className = $datasetRow->phpClass;

            /** @var AbstractDataset $dataset */
            $dataset = new $className();

            if ($dataset->site !== null) {
                $dataset->site->title = 'Data';

                $row->addSite($dataset->site);

            } else {
                $row->addEmpty();
            }

        }

        return parent::getContent();

    }
}