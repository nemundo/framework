<?php

require '../../config.php';

$html = new \Nemundo\Html\Document\HtmlDocument();
$html->title = 'Srf Player';

$srfPlayer = new \Nemundo\Com\Video\Srf\SrfPlayer($html);
$srfPlayer->videoId = '77ea500a-3748-480a-83d6-015213b10024';

$html->render();
