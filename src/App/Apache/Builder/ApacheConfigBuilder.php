<?php


namespace Nemundo\App\Apache\Builder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Project\Path\TmpPath;

class ApacheConfigBuilder extends AbstractBase
{

    public $serverName='default';

    public $path;


    public function getContent() {

        $line = new TextDirectory();
        $line->addValue('<VirtualHost *:80>');
        $line->addValue('ServerName '.$this->serverName);
        $line->addValue('DocumentRoot '.$this->path);
        $line->addValue('<Directory "'.$this->path.'">');
        $line->addValue('Require all granted');
        $line->addValue('AllowOverride All');
        $line->addValue('</Directory>');
        $line->addValue('</VirtualHost>');

        //return $line->getText();
        return $line->getTextWithSeperator("\r\n");

        //\r\n


    }


    public function createConfigFile() {


        $filename=(new TmpPath())
            ->addPath($this->serverName.'.conf')
            ->getFilename();

        $file=new TextFileWriter($filename);
        $file->addLine($this->getContent());

        /*$file->addLine('<VirtualHost *:80>');
        $file->addLine('ServerName '.$this->serverName);
        $file->addLine('DocumentRoot '.$this->path);
        $file->addLine('<Directory "'.$this->path.'">');
        $file->addLine('Require all granted');
        $file->addLine('AllowOverride All');
        $file->addLine('</Directory>');
        $file->addLine('</VirtualHost>');*/
        $file->saveFile();


        return $filename;

    }


}