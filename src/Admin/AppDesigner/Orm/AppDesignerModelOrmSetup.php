<?php

namespace Nemundo\Admin\AppDesigner\Orm;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelReader;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Db\DbConfig;
use Nemundo\Db\Provider\SqLite\Connection\SqLiteConnection;
use Nemundo\Model\Setup\ModelSetup;
use Nemundo\Orm\Setup\OrmModelSetup;
use Nemundo\Project\AbstractProject;


class AppDesignerModelOrmSetup extends AbstractBaseClass
{

    /**
     * @var SqLiteConnection
     */
    public $connection;

    /**
     * @var AbstractProject
     */
    public $project;

    /**
     * @var bool
     */
    public $runSetup = true;

    public function createOrm($modelId)
    {

        if ($this->project == null) {
            $this->project = AppDesignerConfig::$defaultProject;
        }

        $modelReader = new AppModelReader();
        $modelReader->connection = $this->connection;
        $modelRow = $modelReader->getRowById($modelId);

        $factory = new AppDesignerOrmModelFactory();
        $factory->connection = $this->connection;
        $model = $factory->getOrmModelClass($modelId);

        $orm = new OrmModelSetup();
        $orm->project = $this->project;
        $orm->model = $model;
        $orm->createOrm();

        $orm = new CollectionOrm();
        $orm->connection = $this->connection;
        $orm->project = $this->project;
        $orm->appId = $modelRow->appId;
        $orm->createCollection();

        if ($this->runSetup) {
            if (DbConfig::$defaultConnection !== null) {
                $setup = new ModelSetup();
                $setup->model = $model->getModel();
                $setup->createTable();
            }
        }

    }

}