<?php

namespace Nemundo\App\System\Com\Table;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Db\DbConfig;
use Nemundo\Db\Provider\MySql\Database\MySqlDatabase;
use Nemundo\Project\ProjectConfig;
use Nemundo\Web\WebConfig;

class ProjectTable extends AdminLabelValueTable
{

    public function getContent()
    {

        if (DbConfig::$defaultConnection->isObjectOfClass(MySqlDatabase::class)) {

            $this->addLabelValue('Host', DbConfig::$defaultConnection->connectionParameter->host);
            $this->addLabelValue('Port', DbConfig::$defaultConnection->connectionParameter->port);
            $this->addLabelValue('Database', DbConfig::$defaultConnection->connectionParameter->database);
            $this->addLabelValue('User', DbConfig::$defaultConnection->connectionParameter->user);

        }

        $this->addLabelValue('Project Path', ProjectConfig::$projectPath);
        $this->addLabelValue('Web Url', WebConfig::$webUrl);




        return parent::getContent();

    }

}