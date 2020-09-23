<?php

namespace Nemundo\Model\Item\File;


use Nemundo\Html\Multimedia\Video;
use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Model\Reader\Property\File\FileReaderProperty;

class VideoModelItem extends AbstractModelItem
{

    public function getContent()
    {

        $fileProperty = new FileReaderProperty($this->row, $this->type);

        $player = new Video($this);
        $player->src = $fileProperty->getUrl();
        $player->width = 500;

        return parent::getContent();
    }

}