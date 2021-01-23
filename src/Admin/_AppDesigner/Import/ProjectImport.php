<?php

namespace Nemundo\Admin\AppDesigner\Import;

use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModel;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelCount;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelReader;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelUpdate;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Provider\SqLite\Connection\SqLiteConnection;
use Nemundo\FrameworkProject;

class ProjectImport extends AbstractScript
{


    public function run()
    {


        if (AppDesignerConfig::$defaultProject->getClassName() == FrameworkProject::class) {
            (new Debug())->write('No import in framework project');
            exit;
        }


        //$defaultConnection = new SqLiteConnection();
        //$defaultConnection->filename = AppDesignerConfig::$masterProject->dbFilename;
        //$defaultConnection->filename = AppDesignerConfig::$defaultProject->dbFilename;

        foreach (AppDesignerConfig::$defaultProjectCollection->getProjectList() as $project) {

            if (AppDesignerConfig::$defaultProject->namespace !== $project->namespace) {

                (new \Nemundo\Core\Debug\Debug())->write($project->dbFilename);

                $conn = new SqLiteConnection();
                $conn->filename = $project->dbFilename;

                $modelReader = new AppModelReader();
                $modelReader->connection = $conn;
                $modelReader->filter->andEqual($modelReader->model->active, true);
                $modelReader->filter->andEqual($modelReader->model->editable, true);


                foreach ($modelReader->getData() as $modelRow) {
                    (new \Nemundo\Core\Debug\Debug())->write($modelRow->id); //modelClassName);


                    $count = new AppModelCount();
                    $count->connection = new AppDesignerConnection();  // $defaultConnection;
                    $count->filter->andEqual($count->model->modelNamespace, $modelRow->modelNamespace);

                    if ($count->getCount() == 0) {

                        $data = new AppModel();
                        $data->connection = new AppDesignerConnection();
                        $data->active = true;
                        $data->editable = false;
                        $data->modelLabel = $modelRow->modelLabel;
                        $data->modelClassName = $modelRow->modelClassName;
                        $data->modelNamespace = $modelRow->modelNamespace;
                        $data->save();

                    } else {

                        // update
                        $update = new AppModelUpdate();
                        $update->connection = new AppDesignerConnection();
                        $update->active = true;
                        $update->editable = false;
                        $update->modelLabel = $modelRow->modelLabel;
                        $update->modelClassName = $modelRow->modelClassName;
                        $update->modelNamespace = $modelRow->modelNamespace;
                        $update->filter->andEqual($count->model->modelNamespace, $modelRow->modelNamespace);
                        $update->update();


                    }

                }


            }

        }

    }

}