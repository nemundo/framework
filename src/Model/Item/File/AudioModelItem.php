<?php

namespace Nemundo\Model\Item\File;


use Nemundo\Html\Multimedia\Audio;
use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Model\Reader\Property\File\FileReaderProperty;

class AudioModelItem extends AbstractModelItem
{

    public function getContent()
    {

        $fileProperty = new FileReaderProperty($this->row, $this->type);

        $player = new Audio($this);
        $player->src = $fileProperty->getUrl();

        return parent::getContent();

    }

}