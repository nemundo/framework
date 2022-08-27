<?php

namespace Nemundo\Admin\Com\Carousel;

use Nemundo\Admin\Com\Image\AdminImage;
use Nemundo\Com\JavaScript\Module\ModuleJavaScript;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Inline\Span;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\FontAwesome\FontAwesomeIcon;


class AdminImageCarousel extends Div
{

    /**
     * @var Div
     */
    private $carouselDiv;

    /**
     * @var Div
     */
    private $dotDiv;

    private $imageIndex = 0;


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->id = 'admin-carousel';
        $this->addCssClass('admin-carousel');

        $this->carouselDiv = new Div($this);
        $this->carouselDiv->id = 'admin-carousel-item-list';
        $this->carouselDiv->addCssClass('admin-carousel-item-list');

        $this->dotDiv = new Div($this);
        $this->dotDiv->id = 'admin-carousel-dot';
        $this->dotDiv->addCssClass('admin-carousel-dot');

    }


    public function addImage($url, $description = null)
    {

        $item = new Div($this->carouselDiv);
        $item->addCssClass('admin-carousel-item');

        $img = new AdminImage($item);
        $img->addCssClass('admin-carousel-image');
        $img->src = $url;

        if ($description !== null) {
            $p = new Paragraph($item);
            $p->content = $description;
        }

        $span = new Span($this->dotDiv);
        $span->addCssClass('admin-carousel-dot-item');
        $span->addDataAttribute('image-index', $this->imageIndex);

        $this->imageIndex++;

    }


    public function getContent()
    {

        $module = new ModuleJavaScript($this);
        $module->src = '/package/js/framework/Admin/Carousel/carousel.js';

        $previous = new FontAwesomeIcon($this);
        $previous->id = 'admin-carousel-previous-icon';
        $previous->addCssClass('admin-carousel-icon');
        $previous->addCssClass('admin-carousel-icon-previous');
        $previous->icon = 'chevron-left';

        $next = new FontAwesomeIcon($this);
        $next->id = 'admin-carousel-next-icon';
        $next->addCssClass('admin-carousel-icon');
        $next->addCssClass('admin-carousel-icon-next');
        $next->icon = 'chevron-right';

        return parent::getContent();

    }

}