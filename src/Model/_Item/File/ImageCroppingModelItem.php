<?php

namespace Nemundo\Model\Item\File;


use Nemundo\Html\Image\Img;
use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Model\Reader\Property\File\ImageReaderProperty;
use Nemundo\Model\Type\File\ImageType;

class ImageCroppingModelItem extends AbstractModelItem
{

    /**
     * @var ImageType
     */
    public $type;

    public function getContent()
    {

        $imageProperty = null;
        $url = null;
        if ($this->type->defaultFormat !== null) {
            $imageProperty = new ImageReaderProperty($this->row, $this->type);
            $url = $imageProperty->getImageUrl($this->type->defaultFormat);
        } else {
            $imageProperty = new ImageReaderProperty($this->row, $this->type);
            $url = $imageProperty->getUrl();
        }

        $image = new Img($this);
        $image->src = $url;

        return parent::getContent();
    }

}