<?php

require __DIR__ . '/../config.php';

$url = 'https://paranautik.com';

$htmlParser = new \Nemundo\Crawler\HtmlParser\HtmlParser();
$htmlParser->fromUrl($url);

(new \Nemundo\Core\Debug\Debug())->write($htmlParser->getPageTitle());

