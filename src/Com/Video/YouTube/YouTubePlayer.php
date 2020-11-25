<?php

namespace Nemundo\Com\Video\YouTube;


use Nemundo\Com\Video\AbstractVideoPlayer;
use Nemundo\Core\Http\Url\UrlInformation;
use Nemundo\Html\Iframe\Iframe;


// https://developers.google.com/youtube/iframe_api_reference

class YouTubePlayer extends AbstractVideoPlayer
{

    public function getContent()
    {

        $this->checkProperty('videoId');

        $url = new UrlInformation('https://www.youtube.com/embed/' . $this->videoId . '?');
        $url->addParameterValue('showinfo', '0');
        $url->addParameterValue('controls', '0');
        $url->addParameterValue('rel', '0');

        $iframe = new Iframe($this);
        $iframe->width = $this->width;
        $iframe->height = $this->height;
        $iframe->src = $url->getUrl();
        $iframe->addAttributeWithoutValue('allowfullscreen');

        return parent::getContent();

    }

}