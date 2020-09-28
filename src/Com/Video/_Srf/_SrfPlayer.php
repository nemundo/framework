<?php

namespace Nemundo\Com\Video\Srf;


use Nemundo\Com\Video\AbstractVideoPlayer;
use Nemundo\Html\Iframe\Iframe;

class SrfPlayer extends AbstractVideoPlayer
{

    public function getContent()
    {

        $url = '//tp.srgssr.ch/p/srf/embed?urn=urn:srf:video:' . $this->videoId;

        $iframe = new Iframe($this);
        $iframe->width = $this->width;
        $iframe->height = $this->height;
        $iframe->src = $url;

        return parent::getContent();
    }

}