<?php

namespace Nemundo\Project\Config;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Config\ConfigWriter;
use Nemundo\Core\Console\ConsoleInput;
use Nemundo\Core\Type\File\File;

class ProjectConfigWriter extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $filename;

    public function writeFile()
    {

        // bestehendes File anzeigen
        // bestehendes File überschreiben

        /*if (!$this->checkProperty('filename')) {
            return;
        }*/

        $file = new File($this->filename);

        if (!$file->fileExists()) {

            $writer = new ConfigWriter($this->filename);
            //$writer->filename = $this->filename;
            $writer->overwriteExistingFile = true;

            $input = new ConsoleInput();
            $input->message = 'MySql Host';
            $input->defaultValue = 'localhost';
            $writer->add('mysql_host', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'MySql Port';
            $input->defaultValue = 3306;
            $writer->add('mysql_port', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'MySql User';
            $input->defaultValue = 'root';
            $writer->add('mysql_user', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'MySql Password';
            $writer->add('mysql_password', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'MySql Database';
            $input->defaultValue = 'test_project';
            $writer->add('mysql_database', $input->getValue());

            $input = new ConsoleInput();
            $input->message = 'Web Url';
            $input->defaultValue = '/';
            $writer->add('web_url', $input->getValue());

            /*$input = new ConsoleInput();
            $input->message = 'Send Mail';
            $input->defaultValue = 'false';
            $writer->add('send_mail', $input->getValue());*/

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
            $writer->add('staging_enviroment', $input->getValue());

            $writer->writeFile();

        }

    }

}