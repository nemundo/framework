<?php

require __DIR__ . '/../config.php';

//$url = 'https://paranautik.com';

$url='https://www.facebook.com/events/2808262429487312/';



$htmlParser = new \Nemundo\Crawler\HtmlParser\HtmlParser();
$htmlParser->fromUrl($url);

(new \Nemundo\Core\Debug\Debug())->write($htmlParser->getPageTitle());

