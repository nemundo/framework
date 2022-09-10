<?php

namespace Nemundo\Admin\Com\Form\File;

use Nemundo\Com\Package\PackageTrait;
use Nemundo\Core\Image\Cropping\CroppingDimension;
use Nemundo\Package\CropperJs\CropperJs;
use Nemundo\Package\Jquery\Package\JqueryPackage;

class AdminCroppingImageUpload extends AdminImageUpload
{

    use PackageTrait;

    public $imageUrl;

    /**
     * @var CroppingDimension
     */
    public $croppingDimension;

    public $aspectRatioX;

    public $aspectRatioY;


    /**
     * @var CropperJs
     */
    private $croppingImage;


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->addPackage(new JqueryPackage());
        $this->croppingImage = new CropperJs($this);

    }


    public function getContent()
    {

        if ($this->croppingDimension !== null) {
            $this->croppingImage->imageUrl = $this->imageUrl;
            $this->croppingImage->aspectRatioWidth = $this->aspectRatioX;
            $this->croppingImage->aspectRatioHeight = $this->aspectRatioY;
            $this->croppingImage->croppingDimension = $this->croppingDimension;
        }

        return parent::getContent();

    }


    public function getCroppingDimension()
    {

        return $this->croppingImage->getCroppingDimension();

    }

}