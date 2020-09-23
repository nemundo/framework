<?php

namespace Nemundo\Admin\AppDesigner\Orm;


use Nemundo\Admin\AppDesigner\Data\App\AppReader;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelReader;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Db\Provider\SqLite\Connection\SqLiteConnection;
use Nemundo\Orm\Setup\OrmModelSetup;
use Nemundo\Project\AbstractProject;

class ProjectOrm extends AbstractBaseClass
{

    /**
     * @var AbstractProject
     */
    public $project;

    private $connection;


    private function loadConnection()
    {

        if ($this->connection == null) {

            if (!$this->checkObject('project', $this->project, AbstractProject::class)) {
                return;
            }


            $this->connection = new SqLiteConnection();
            $this->connection->filename = $this->project->dbFilename;
            $this->connection->checkFilename();


        }


    }


    public function createOrm()
    {

        $this->loadConnection();

        foreach ($this->getAppRow() as $appRow) {


            foreach ($this->getModelRow($appRow->id) as $modelRow) {

                $factory = new AppDesignerOrmModelFactory();
                $factory->connection = $this->connection;
                $model = $factory->getOrmModelClass($modelRow->id);

                $orm = new OrmModelSetup();
                $orm->project = $this->project;
                $orm->model = $model;
                $orm->createOrm();

            }

            $orm = new CollectionOrm();
            $orm->project = $this->project;
            $orm->appId = $appRow->id;
            $orm->connection = $this->connection;
            $orm->createCollection();

        }

    }


    public function deleteOrm()
    {

        $this->loadConnection();

        foreach ($this->getAppRow() as $appRow) {

            foreach ($this->getModelRow($appRow->id) as $modelRow) {

                $factory = new AppDesignerOrmModelFactory();
                $factory->connection = $this->connection;
                $model = $factory->getOrmModelClass($modelRow->id);

                $orm = new OrmModelSetup();
                $orm->project = $this->project;
                $orm->model = $model;
                $orm->deleteOrm();

            }

        }

    }


    private function getAppRow()
    {


        if (!$this->checkObject('project', $this->project, AbstractProject::class)) {
            return;
        }


        $appReader = new AppReader();
        $appReader->connection = $this->connection;
        $appReader->filter->andEqual($appReader->model->active, true);

        return $appReader->getData();


    }


    private function getModelRow($appId)
    {

        $modelReader = new AppModelReader();
        $modelReader->connection = $this->connection;
        $modelReader->filter->andEqual($modelReader->model->appId, $appId);
        $modelReader->filter->andEqual($modelReader->model->active, true);
        $modelReader->filter->andEqual($modelReader->model->editable, true);
        $modelReader->addOrder($modelReader->model->modelLabel);

        return $modelReader->getData();

    }

}