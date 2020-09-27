<?php

namespace Nemundo\Project\Config;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Config\ConfigWriter;
use Nemundo\Core\Type\File\File;

class ProjectConfigBuilder extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $filename;

    public $mysqlHost = 'localhost';

    public $mysqlPort = 3306;

    public $mysqlUser = 'root';

    public $mysqlPassword;

    public $mysqlDatabase;

    public $webUrl = '/';


    public function writeConfigFile()
    {

        $file = new File($this->filename);

        if (!$file->fileExists()) {

            $writer = new ConfigWriter($this->filename);
            $writer->overwriteExistingFile = true;

            $writer->add('mysql_host', $this->mysqlHost);
            $writer->add('mysql_port', $this->mysqlPort);
            $writer->add('mysql_user', $this->mysqlUser);
            $writer->add('mysql_password', $this->mysqlPassword);
            $writer->add('mysql_database', $this->mysqlDatabase);
            $writer->add('web_url', $this->webUrl);


            /*
            $input = new ConsoleInput();
            $input->message = 'Smtp Host';
            $writer->add('smtp_host', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'Smtp Authentication';
            $input->defaultValue = 'true';
            $writer->add('smtp_authentication', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'Smtp User';
            $writer->add('smtp_user', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'Smtp Password';
            $writer->add('smtp_password', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'Smtp Port';
            $writer->add('smtp_port', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'Default Mail Address';
            $writer->add('default_mail_address', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'Default Mail Text';
            $writer->add('default_mail_text', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'Staging Enviroment';
            $input->defaultValue = 'development';
            $writer->add('staging_enviroment', $input->getValue());*/

            $writer->writeFile();

        }

    }

}