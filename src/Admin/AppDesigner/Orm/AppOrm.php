<?php

namespace Nemundo\Admin\AppDesigner\Orm;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\App\AppReader;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;

class AppOrm extends AbstractBase
{

    public function createAppOrm($appId)
    {

        $appReader = new AppReader();
        $appReader->connection = new AppDesignerConnection();

        $appRow = $appReader->getRowById($appId);


        // Install
        $phpClass = new PhpClass();
        $phpClass->project = AppDesignerConfig::$defaultProject;
        $phpClass->className = $appRow->appName . 'Install';
        $phpClass->namespace = $appRow->appNamespace . '\\' . 'Install';
        $phpClass->extendsFromClass = 'AbstractScript';

        $phpClass->addUseClass('Nemundo\App\Script\Type\AbstractScript');

        /*$function = new PhpFunction($phpClass);
        $function->functionName = 'loadScript()';
        $function->visibility = PhpVisibility::ProtectedVariable;

        $function->add('$this->scriptName = "' . $appRow->appPrefix . '-install";');
        $function->add('$this->consoleScript= true;');*/

        $function = new PhpFunction($phpClass);
        $function->functionName = 'run()';


        // Example Page
        /*$phpClass = new PhpClass();
        $phpClass->project = AppDesignerConfig::$defaultProject;
        $phpClass->className = $appRow->appName . 'Page';
        $phpClass->namespace = $appRow->appNamespace . '\\' . 'Page';

/*
        $function = new PhpFunction($phpClass);
        $function->functionName = 'getHtml()';
        $function->addEmptyLine();
        $function->add('return parent::getHtml();');*/

        $phpClass->saveFile();


    }

}