<?php

require __DIR__ . '/../config.php';

$reader = new \Nemundo\Rss\RssReader();
//$reader->feedUrl = 'https://www.spiegel.de/schlagzeilen/index.rss';
$reader->feedUrl = 'https://www.srf.ch/';
//$reader->feedUrl = 'https://www.advance.ch/nc/de/home/rss-feed/?type=100';
(new \Nemundo\Core\Debug\Debug())->write($reader->getTitle());

foreach ($reader->getData() as $item) {
    (new \Nemundo\Core\Debug\Debug())->write($item->title);
    (new \Nemundo\Core\Debug\Debug())->write($item->description);
    (new \Nemundo\Core\Debug\Debug())->write($item->url);
}
