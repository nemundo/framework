<?php

namespace Nemundo\Com\Video\YouTube;


use Nemundo\Core\Http\Url\UrlInformation;
use Nemundo\Html\Iframe\Iframe;
use Nemundo\Com\Video\AbstractVideoPlayer;
use Nemundo\Web\Url\Url;


// https://developers.google.com/youtube/iframe_api_reference

class YouTubePlayer extends AbstractVideoPlayer
{

    public function getContent()
    {


        $this->checkProperty('videoId');




        //$url = new Url('https://www.youtube.com/embed/' . $this->videoId . '?');
        //$url->addParameterValue()

        $url=new UrlInformation('https://www.youtube.com/embed/' . $this->videoId . '?');



        //$url->addParameterValue('autoplay', '1');

        $url->addParameterValue('showinfo', '0');
        $url->addParameterValue('controls', '0');
        $url->addParameterValue('rel', '0');

        $iframe = new Iframe($this);
        $iframe->width = $this->width;  // '100%';  // $this->width;
        //$iframe->height = '100%';
        $iframe->height = $this->height;
        $iframe->src = $url->getUrl();


        // ?rel=0&amp;showinfo=0"


        return parent::getContent();

    }

}