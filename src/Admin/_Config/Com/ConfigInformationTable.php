<?php

namespace Nemundo\Admin\Config\Com;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Mail\MailConfig;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Db\DbConfig;
use Nemundo\Dev\Deployment\DeploymentConfig;
use Nemundo\Web\WebConfig;

class ConfigInformationTable extends AbstractHtmlContainer
{

    public function getContent()
    {

        $title = new AdminSubtitle($this);
        $title->id = 'config_database';
        $title->content = 'Database';
        $table = new AdminLabelValueTable($this);
        $table->addLabelValue('Host', DbConfig::$defaultConnection->connectionParameter->host);
        $table->addLabelValue('User', DbConfig::$defaultConnection->connectionParameter->user);
        $table->addLabelValue('Password', '***');
        $table->addLabelValue('Database', DbConfig::$defaultConnection->connectionParameter->database);
        $table->addLabelValue('Port', DbConfig::$defaultConnection->connectionParameter->port);

        $table->addLabelValue('Log Slow Query', DbConfig::$slowQueryLog);
        $table->addLabelValue('Log Slow Query Limit', DbConfig::$slowQueryLimit);


        $title = new AdminSubtitle($this);
        $title->id = 'config_smtp';
        $title->content = 'Smtp';
        $table = new AdminLabelValueTable($this);
        //$table->addLabelValue('Send Mail', MailConfig::$sendMail);
        $table->addLabelValue('Host', MailConfig::$mailConnection->host);
        $table->addLabelValue('User', MailConfig::$mailConnection->user);
        $table->addLabelValue('Password', '***');
        $table->addLabelValue('Port', MailConfig::$mailConnection->port);

        $table->addLabelValue('Default From', MailConfig::$defaultMailFrom);
        $table->addLabelValue('Default From Text', MailConfig::$defaultMailFromText);

        //$table->addLabelValue('Database', DbConfig::$defaultConnection->connectionParameter->database);
        //$table->addLabelValue('Port', DbConfig::$defaultConnection->connectionParameter->port);

        $title = new AdminSubtitle($this);
        $title->id = 'config_web';
        $title->content = 'Web';
        $table = new AdminLabelValueTable($this);
        $table->addLabelValue('Web Url', WebConfig::$webUrl);

        $title = new AdminSubTitle($this);
        $title->id = 'config_deployment';
        $title->content = 'Deployment';
        $table = new AdminLabelValueTable($this);
        $table->addLabelValue('Staging Environment', DeploymentConfig::$stagingEnviroment);


        return parent::getContent();
    }

}