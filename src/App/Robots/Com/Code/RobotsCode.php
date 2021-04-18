<?php


namespace Nemundo\App\Robots\Com\Code;


use Nemundo\App\Robots\Filename\RobotsFilename;
use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Html\Typography\Code;

class RobotsCode extends Code
{

    public function getContent()
    {

        $filename = (new RobotsFilename())->getFullFilename();

        $reader = new TextFileReader($filename);
        $this->content = (new Html($reader->getText()))->getValue();

        return parent::getContent();

    }

}