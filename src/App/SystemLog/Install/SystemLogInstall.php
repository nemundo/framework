<?php

namespace Nemundo\App\SystemLog\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\App\SystemLog\Data\LogType\LogType;
use Nemundo\App\SystemLog\Data\SystemLogCollection;
use Nemundo\App\SystemLog\Type\AbstractLogType;
use Nemundo\App\SystemLog\Type\ErrorLogType;
use Nemundo\App\SystemLog\Type\InformationLogType;
use Nemundo\App\SystemLog\Type\WarningLogType;
use Nemundo\Model\Setup\ModelCollectionSetup;

class SystemLogInstall extends AbstractScript
{

    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new SystemLogCollection());

        $this->addLogType(new InformationLogType());
        $this->addLogType(new WarningLogType());
        $this->addLogType(new ErrorLogType());


    }


    private function addLogType(AbstractLogType $logType)
    {

        $data = new LogType();
        $data->updateOnDuplicate = true;
        $data->id = $logType->id;
        $data->logType = $logType->logType;
        $data->save();

    }


}