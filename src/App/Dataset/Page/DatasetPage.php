<?php

namespace Nemundo\App\Dataset\Page;

use Nemundo\Admin\Com\Breadcrumb\AdminBreadcrumb;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Item\AdminItemContainer;
use Nemundo\Admin\Com\Item\AdminItemText;
use Nemundo\Admin\Com\Item\AdminItemTitle;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Dataset\Com\ListBox\CategoryListBox;
use Nemundo\App\Dataset\Com\ListBox\OrganisationListBox;
use Nemundo\App\Dataset\Parameter\DatasetParameter;
use Nemundo\App\Dataset\Reader\Dataset\DatasetDataReader;
use Nemundo\App\Dataset\Site\DatasetSite;
use Nemundo\App\Dataset\Site\DataSite;
use Nemundo\App\Dataset\Type\AbstractDataset;
use Nemundo\Com\Template\AbstractTemplateDocument;

class DatasetPage extends AbstractTemplateDocument
{
    public function getContent()
    {


        $layout = new AdminFlexboxLayout($this);


        $breadcrumb = new AdminBreadcrumb($layout);
        $breadcrumb->addSite(DatasetSite::$site);



        $search = new AdminSearchForm($layout);

        $category = new CategoryListBox($search);
        $category->submitOnChange = true;
        $category->searchMode = true;

        $organisation = new OrganisationListBox($search);
        $organisation->submitOnChange = true;
        $organisation->searchMode = true;


        $datasetReader = new DatasetDataReader();

        if ($category->hasValue()) {
            $datasetReader->filter->andEqual($datasetReader->model->categoryId, $category->getValue());
        }

        if ($organisation->hasValue()) {
            $datasetReader->filter->andEqual($datasetReader->model->organisationId, $organisation->getValue());
        }


        foreach ($datasetReader->getData() as $datasetRow) {

            $container = new AdminItemContainer($this);

            $title = new AdminItemTitle($container);  // new AdminItemSubtitle($container);
            $title->content = $datasetRow->dataset;

            $description = new AdminItemText($container);
            $description->content = $datasetRow->description;

            $table = new AdminLabelValueTable($container);
            $table->addLabelHyperlink($datasetReader->model->url->label, $datasetRow->url);
            $table->addLabelHyperlink($datasetReader->model->documentationUrl->label, $datasetRow->documentationUrl);
            $table->addLabelValue($datasetReader->model->url->label, $datasetRow->licence);
            $table->addLabelHyperlink($datasetReader->model->licenceUrl->label, $datasetRow->licenceUrl);
            $table->addLabelValue($datasetReader->model->category->label, $datasetRow->category->category);
            $table->addLabelValue($datasetReader->model->organisation->label, $datasetRow->organisation->organisation);

            //$className = $datasetRow->phpClass;

            /** @var AbstractDataset $dataset */
            //$dataset = new $className();

            $dataset = $datasetRow->getDataset();


            if ($dataset->site !== null) {
                $dataset->site->title = 'Data';

                $btn = new AdminSiteButton($container);
                $btn->content = 'Data';
                $btn->site = $dataset->site;

            }


            if ($dataset->hasDataContainer()) {

                $site = clone(DataSite::$site);
                $site->addParameter(new DatasetParameter($datasetRow->id));

                $btn = new AdminSiteButton($container);
                $btn->site = $site;

            }



        }

        //new DatasetContainer($this);




        return parent::getContent();

    }
}