<?php

namespace Nemundo\Admin\MySql\Site;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\MySql\Parameter\TableParameter;
use Nemundo\Admin\MySql\Site\Action\MySqlDropTableSite;
use Nemundo\Admin\MySql\Site\Action\MySqlEmptyTableSite;
use Nemundo\Admin\MySql\Table\MySqlDataTable;
use Nemundo\App\Application\Com\ApplicationListBox;
use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Db\Count\DataCount;
use Nemundo\Db\Provider\MySql\Table\MySqlTable;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Heading\H2;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Model\Factory\ModelCollectionFactory;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\Url;


//
class MySqlApplicationDataSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Application Data';
        $this->url = 'application-data';

        new MySqlEmptyTableSite($this);
        new MySqlDropTableSite($this);


    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        //new MySqlNavigation($page);

        $form = new SearchForm($page);

        $formRow = new BootstrapFormRow($form);

        $applicationListBox = new ApplicationListBox($formRow);
        $applicationListBox->submitOnChange = true;
        $applicationListBox->value = $applicationListBox->getValue();


        if ($applicationListBox->hasValue()) {

            $applicationRow = (new ApplicationReader())->getRowById($applicationListBox->getValue());
            $application = $applicationRow->getApplication();  // getApplicationClassObject();

            if ($application->modelCollectionClass !== null) {

                $row = new BootstrapRow($page);

                $col1 = new BootstrapColumn($row);
                $col1->columnWidth = 3;

                $col2 = new BootstrapColumn($row);
                $col2->columnWidth = 3;


                $listbox = new BootstrapHyperlinkList($col1);

                $collection = (new ModelCollectionFactory())->getModelCollectionByClassName($application->modelCollectionClass);
                foreach ($collection->getModelList() as $model) {

                    $url = new Url();
                    $url->addParameter((new TableParameter($model->tableName)));

                    $listbox->addHyperlink($model->tableName, $url->getUrl());

                }


                $tableParameter = new TableParameter();
                if ($tableParameter->exists()) {

                    $tableName = $tableParameter->getValue();

                    $title = new H2($col2);
                    $title->content = $tableName;

                    $table = new MySqlTable($tableName);

                    if ($table->existsTable()) {

                        $count = new DataCount();
                        $count->tableName = $tableName;

                        $p = new Paragraph($col2);
                        $p->content = (new Number($count->getCount()))->formatNumber() . ' Rows';

                        $btn = new AdminSiteButton($col2);
                        $btn->site = clone(MySqlEmptyTableSite::$site);
                        $btn->site->addParameter($tableParameter);

                        $btn = new AdminSiteButton($col2);
                        $btn->site = clone(MySqlDropTableSite::$site);
                        $btn->site->addParameter($tableParameter);

                        $data = new MySqlDataTable($col2);
                        $data->tableName = $tableName;
                        $data->limit = 50;

                    } else {
                        $p = new Paragraph($col2);
                        $p->content = 'Table does not exist';
                    }

                }

            }

        }

        $page->render();

    }

}