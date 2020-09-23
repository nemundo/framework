<?php

namespace Nemundo\Package\Bootstrap\Carousel;


use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class BootstrapImageCarousel extends BootstrapCarousel
{

    public function addImage($imageUrl)
    {

        $item = new BootstrapCarouselItem($this);

        $carouselImage = new BootstrapResponsiveImage($item);
        //$carouselImage->addCssClass('mx-auto d-block');
        //$carouselImage->addCssClass('carousel_image');
        $carouselImage->src = $imageUrl;



    }

}