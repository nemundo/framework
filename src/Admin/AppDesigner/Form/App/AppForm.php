<?php

namespace Nemundo\Admin\AppDesigner\Form\App;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\App\App;
use Nemundo\Admin\AppDesigner\Data\App\AppCount;
use Nemundo\Admin\AppDesigner\Orm\AppOrm;
use Nemundo\Admin\AppDesigner\Parameter\AppParameter;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class AppForm extends BootstrapForm
{

    use LibraryTrait;

    /**
     * @var BootstrapTextBox
     */
    private $appName;

    /**
     * @var BootstrapTextBox
     */
    private $appPrefix;

    /**
     * @var BootstrapTextBox
     */
    private $appNamespace;

    public function getContent()
    {

        $namespacePrefix = AppDesignerConfig::$defaultProject->namespace . '\\App\\';

        $this->appName = new BootstrapTextBox($this);
        $this->appName->name = 'app_name';
        $this->appName->label = 'App Name';
        $this->appName->validation = true;
        $this->appName->autofocus = true;

        $this->appPrefix = new BootstrapTextBox($this);
        $this->appPrefix->name = 'app_prefix';
        $this->appPrefix->label = 'App Prefix';
        $this->appPrefix->validation = true;

        $this->appNamespace = new BootstrapTextBox($this);
        $this->appNamespace->name = 'app_namespace';
        $this->appNamespace->label = 'App Namespace';
        $this->appNamespace->validation = true;
        $this->appNamespace->value = $namespacePrefix;


        $this->addJqueryScript('$("#app_name").keyup(function() {');
        $this->addJqueryScript('value = $("#' . $this->appName->name . '" ).val();');
        $this->addJqueryScript('prefix = value.toLowerCase().replace(" ", "_");');
        //$this->addJqueryScript('prefix = p.replace(" ", "_");');

        // ö, ä, ü etc. plus alle ersetzen (muss mit regex gelöst werden
        // https://www.w3schools.com/jsref/jsref_replace.asp
        // / /g

        //$this->addJqueryScript('namespace = "' . AppDesignerConfig::$defaultProject->namespace . '\\Admin\\' . '" + value.replace(" ", "");');

        $this->addJqueryScript('namespace = "' . (new Text($namespacePrefix))->replace('\\', '\\\\')->getValue() . '" + value.replace(" ", "");');
        $this->addJqueryScript('$("#' . $this->appPrefix->name . '" ).val(prefix);');
        $this->addJqueryScript('$("#' . $this->appNamespace->name . '" ).val(namespace);');


        $this->addJqueryScript('});');

        return parent::getContent();


    }


    protected function onValidate()
    {

        $returnValue = parent::onValidate();

        $appName = $this->appName->getValue();

        $count = new AppCount();
        $count->connection = new AppDesignerConnection();
        $count->filter->andEqual($count->model->appName, $appName);
        $count->filter->andEqual($count->model->active, true);
        if ($count->getCount() > 0) {
            $this->appName->showErrorMessage = true;
            $this->appName->errorMessage = 'Name already in use';
            $returnValue = false;
        }

        return $returnValue;

    }


    protected function onSubmit()
    {

        $data = new App();
        $data->connection = new AppDesignerConnection();
        $data->active = true;
        $data->appName = $this->appName->getValue();
        $data->appPrefix = $this->appPrefix->getValue();
        $data->appNamespace = $this->appNamespace->getValue();
        $appId = $data->save();

        $orm = new AppOrm();
        $orm->createAppOrm($appId);

        $site = (AppDesignerConfig::$site->app->appModel);
        $site->addParameter(new AppParameter($appId));
        $this->redirectSite = $site;

    }

}