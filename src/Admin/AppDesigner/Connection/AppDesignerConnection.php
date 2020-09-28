<?php

namespace Nemundo\Admin\AppDesigner\Connection;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Db\Provider\SqLite\Connection\SqLiteConnection;

class AppDesignerConnection extends SqLiteConnection
{

    protected function loadConnection()
    {

        $this->filename = AppDesignerConfig::$defaultProject->dbFilename;

    }

}