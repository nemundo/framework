<?php

namespace Nemundo\Admin\AppDesigner\Model\App;


use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Model\Definition\Model\ModelTrait\ActiveModelTrait;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\Number\YesNoOrmType;
use Nemundo\Orm\Type\Text\TextOrmType;

class AppOrmModel extends AbstractOrmModel
{

    use ActiveModelTrait;

    /**
     * @var YesNoOrmType
     */
    public $active;

    /**
     * @var TextOrmType
     */
    public $appName;

    /**
     * @var TextOrmType
     */
    public $appPrefix;

    /**
     * @var TextOrmType
     */
    public $appNamespace;


    protected function loadModel()
    {

        $this->tableName = 'app_app';
        $this->className = 'App';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\App';

        $this->primaryIndex = new UniqueIdPrimaryIndex();

        $this->loadActiveModelTrait();

        /*
        $this->active = new YesNoOrmType($this);
        $this->active->fieldName = 'active';
        $this->active->variableName = 'active';
        $this->active->label = 'Active';
        $this->active->defaultValue = true;
        $this->active->visible->form = false;
        $this->active->visible->table = false;
        $this->active->visible->view = false;*/

        $this->appName = new TextOrmType($this);
        $this->appName->label = 'App Name';
        $this->appName->fieldName = 'app_name';
        $this->appName->variableName = 'appName';
        $this->appName->validation = true;

        $this->appPrefix = new TextOrmType($this);
        $this->appPrefix->label = 'App Prefix';
        $this->appPrefix->fieldName = 'app_prefix';
        $this->appPrefix->variableName = 'appPrefix';
        $this->appPrefix->variableName = 'appPrefix';
        $this->appPrefix->validation = true;

        $this->appNamespace = new TextOrmType($this);
        $this->appNamespace->label = 'App Namespace';
        $this->appNamespace->fieldName = 'app_namespace';
        $this->appNamespace->variableName = 'appNamespace';
        $this->appNamespace->validation = true;

        //$this->loadActiveModelTrait();

        $this->addDefaultType($this->appName);
        $this->addDefaultOrderType($this->appName);

        //$this->addInsertAction(new AppAction());
        //$this->addBeforeDeleteAction(new AppDeleteAction());


    }

}