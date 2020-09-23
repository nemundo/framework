<?php

namespace Nemundo\Admin\AppDesigner\Orm;


use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelReader;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Provider\SqLite\Connection\SqLiteConnection;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Project\AbstractProject;


class CollectionOrm extends AbstractBase
{

    /**
     * @var AbstractProject
     */
    public $project;

    /**
     * @var string
     */
    public $appId;

    /**
     * @var SqLiteConnection
     */
    public $connection;


    public function createCollection()
    {

        $factory = new RowFactory();
        $factory->connection = $this->connection;
        $appRow = $factory->getAppRow($this->appId);

        // Install
        $phpClass = new PhpClass();
        $phpClass->overwriteExistingPhpFile = true;
        $phpClass->project = $this->project;
        $phpClass->className = $appRow->appName . 'Collection';
        $phpClass->namespace = $appRow->appNamespace . '\\' . 'Data';
        $phpClass->extendsFromClass = 'AbstractModelCollection';

        $phpClass->addUseClass('Nemundo\Model\Collection\AbstractModelCollection');

        $function = new PhpFunction($phpClass);
        $function->functionName = 'loadCollection()';
        $function->visibility = PhpVisibility::ProtectedVariable;


        $modelReader = new AppModelReader();
        $modelReader->connection = $this->connection;
        $modelReader->filter->andEqual($modelReader->model->active, true);
        $modelReader->filter->andEqual($modelReader->model->appId, $this->appId);

        foreach ($modelReader->getData() as $modelRow) {
            $className = '\\' . $modelRow->modelNamespace . '\\' . $modelRow->modelClassName . 'Model';
            $function->add('$this->addModel(new ' . $className . '());');
        }

        $phpClass->saveFile();

    }

}