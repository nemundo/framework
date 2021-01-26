<?php

namespace Nemundo\Project\Loader;


use Nemundo\Core\Config\ConfigFileReader;
use Nemundo\Db\DbConfig;
use Nemundo\Project\Connection\ProjectSqLiteConnection;
use Nemundo\Project\ProjectConfig;
use Nemundo\Web\WebConfig;

class SqLiteProjectLoader extends AbstractProjectLoader
{

    public function loadProject()
    {

        $reader = new ConfigFileReader();
        $reader->filename = ProjectConfig::$projectPath . 'config.ini';
        WebConfig::$webUrl = $reader->getValue('web_url');

        $this->loadPath();
        DbConfig::$defaultConnection = new ProjectSqLiteConnection();

    }

}