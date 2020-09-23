<?php

namespace Nemundo\Admin\AppDesigner\Delete;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelRow;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\Directory;
use Nemundo\Dev\Code\PhpNamespace;

class ModelFileDelete extends AbstractBase
{


    public function delete(AppModelRow $modelRow)
    {


        // delete Php File
        if (AppDesignerConfig::$deleteMode) {

            $project = AppDesignerConfig::$defaultProject;

            $namespace = new PhpNamespace();
            $namespace->namespace = $modelRow->modelNamespace;
            $namespace->prefixNamespace = $project->namespace;
            $path = $project->path . DIRECTORY_SEPARATOR . $namespace->getPath();

            (new Directory($path))->deleteDirectory();

        }

    }

}