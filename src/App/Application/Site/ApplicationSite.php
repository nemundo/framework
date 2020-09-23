<?php


namespace Nemundo\App\Application\Site;


use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Button\AdminSubmitButton;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Admin\MySql\Parameter\IdParameter;
use Nemundo\Admin\MySql\Parameter\TableParameter;
use Nemundo\Admin\MySql\Site\Action\CsvExportSite;
use Nemundo\App\Application\Com\ApplicationListBox;
use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\MySql\Com\Table\MySqlTableFieldTable;
use Nemundo\App\MySqlAdmin\Com\Table\MySqlDataTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Form\Input\HiddenInput;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Web\Site\AbstractSite;

class ApplicationSite extends AbstractSite
{

    /**
     * @var ApplicationSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Application';
        $this->url = 'application';
        ApplicationSite::$site = $this;

        //new DropTableSite($this);
        new CsvExportSite($this);

    }


    public function loadContent()
    {


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $form = new SearchForm($page);

        $formRow = new BootstrapFormRow($form);

        $application = new ApplicationListBox($formRow);

        $application->submitOnChange = true;
        $application->searchMode = true;


        if ($application->hasValue()) {


            $applicationRow = (new ApplicationReader())->getRowById($application->getValue());

            $title = new AdminTitle($page);
            $title->content = $applicationRow->application;

            $table = new AdminLabelValueTable($page);
            $table->visible = false;


            $application = $applicationRow->getApplication();


            //$className= $applicationRow->applicationClass;
            //$table->addLabelValue('Application Class', $className);


            if ($application !== null) {


                $table->addLabelValue('App Class', $application->getClassName());

                $modelCollection = $application->getModelCollection();

                if ($modelCollection !== null) {

                    $table->addLabelValue('Collection Class', $modelCollection->getClassName());


                    $layout = new BootstrapTwoColumnLayout($page);
                    $layout->col1->columnWidth = 2;
                    $layout->col2->columnWidth = 10;


                    //$listbox= new ModelListBox();

                    $list = new BootstrapHyperlinkList($layout->col1);

                    foreach ($modelCollection->getModelList() as $model) {

                        $site = clone(ApplicationSite::$site);
                        $site->title = $model->label;
                        $site->addParameter((new ApplicationParameter()));
                        $site->addParameter(new ModelParameter($model->tableName));
                        $list->addSite($site);


                    }


                    $modelParameter = new ModelParameter();
                    if ($modelParameter->hasValue()) {
                        //$modelParameter->getModel();

                        $tableName = $modelParameter->getValue();


                        $fieldTable=new MySqlTableFieldTable($layout->col2);
                        $fieldTable->tableName=$tableName;


                        /*$btn=new AdminSiteButton($layout->col2);
                        $btn->site=clone(DropTableSite::$site);
                        $btn->site->addParameter($modelParameter);*/

                        $btn = new AdminSiteButton($layout->col2);
                        $btn->site = clone(CsvExportSite::$site);
                        $btn->site->addParameter(new TableParameter($tableName));


                        $formSearch = new SearchForm($layout->col2);

                        $formRow = new BootstrapFormRow($formSearch);

                        $id = new BootstrapTextBox($formRow);
                        $id->label = 'ID';
                        $id->searchMode = true;
                        $id->name = (new IdParameter())->getParameterName();

                        $parameter = new ApplicationParameter();
                        $hidden = new HiddenInput($formSearch);
                        $hidden->name = $parameter->getParameterName();
                        $hidden->value = $parameter->getValue();

                        $parameter = new ModelParameter();
                        $hidden = new HiddenInput($formSearch);
                        $hidden->name = $parameter->getParameterName();
                        $hidden->value = $parameter->getValue();


                        new AdminSearchButton($formRow);

                        $admin = new MySqlDataTable($layout->col2);
                        $admin->tableName = $modelParameter->getValue();

                        $parameter = new IdParameter();
                        if ($parameter->hasValue()) {
                            $admin->filterId = $parameter->getValue();
                        }


                    }


                }

            }


            /*
            if (class_exists($className)) {


                /** @var AbstractApplication $application2 */
            /*  $application2 = new $className();

              $className2 = $application2->modelCollectionClass;

              if (class_exists($className2)) {
              $modelCollectionClass=new $className2();
              }


              $table->addLabelValue('Model Collection Class', $className2);



          } else {


          }*/


        }


        $page->render();


    }


}