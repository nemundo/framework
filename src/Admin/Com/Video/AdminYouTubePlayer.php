<?php

namespace Nemundo\Admin\Com\Video;

use Nemundo\Com\Video\YouTube\YouTubePlayer;

class AdminYouTubePlayer extends AdminResponsiveVideo
{

    /**
     * @var string
     */
    public $videoId;

    /**
     * @var bool
     */
    public $autoPlay = false;

    public $start;

    public function getContent()
    {

        $youtube = new YouTubePlayer($this);
        $youtube->videoId = $this->videoId;
        $youtube->autoPlay = $this->autoPlay;
        $youtube->start = $this->start;

        return parent::getContent();

    }

}