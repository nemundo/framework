<?php

namespace Nemundo\App\ModelDesigner\Script;


use Nemundo\App\ModelDesigner\Json\ProjectJson;
use Nemundo\App\ModelDesigner\ModelDesignerConfig;
use Nemundo\App\ModelDesigner\Orm\OrmBuilder;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Debug\Debug;

class ModelDesignerOrmScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'modeldesigner-orm';
    }


    public function run()
    {

        foreach ((new ModelDesignerConfig)->getProjectList() as $project) {

            (new Debug())->write($project->projectName);

            $projectJson = new ProjectJson($project);
            foreach ($projectJson->getAppJsonList(true) as $appJson) {

                $orm = new OrmBuilder();
                $orm->project = $project;
                $orm->app = $appJson;
                $orm->deleteOrm();
                //$orm->createOrm();

            }

        }

    }

}