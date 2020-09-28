<?php

require '../../config.php';

$html = new \Nemundo\Html\Document\HtmlDocument();

$player = new \Nemundo\Com\Video\YouTube\YouTubePlayer($html);
$player->videoId = 'REgtLeSV_0Q';

$html->render();
