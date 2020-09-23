<?php

require __DIR__.'/../config.php';

//$url = 'https://www.zentralplus.ch/illegale-spielhoelle-betrieben-nun-greift-die-staatsanwaltschaft-durch-1653137/';
//$url='https://www.der-postillon.com/2019/11/deutsche-bahn-hack.html';
//$url = 'https://www.tagesanzeiger.ch/zuerich/stadt/das-schnelle-ende-des-vermicelleshypes-in-zuerich/story/29235191';
//$url = 'https://www.arte.tv/de/videos/092182-000-A/s-o-s-amazonas/';
//$url = 'https://www.arte.tv/de/';
//$url = 'https://www.zdf.de/dokumentation/zdf-history/amerikas-gangsterkoenige-2-der-sturz-des-paten-100.html';
//$url = 'https://www.zdf.de/politik/auslandsjournal/trump-farage-die-brexit-connection-100.html';
//$url = 'https://www.ardmediathek.de/ard/player/Y3JpZDovL3JiYi1vbmxpbmUuZGUvZG9rdS8yMDE5LTExLTA2VDIyOjQ1OjAwX2I2YzY5ZGI0LTdmNmQtNDhkYi1iZDAzLWU0NWFiM2U4NmRkNC9kb2t1XzIwMTkxMTA2X3NhbWJlc2lfcXVlbGxlbl9kZXNfbGViZW5z/der-sambesi-quellen-des-lebens';
$url = 'https://www.spiegel.de/politik/ausland/israel-baha-abu-al-ata-gezielt-getoetet-im-gazastreifen-a-1296032.html';
$url = 'https://lu-glidz.blogspot.com/2019/11/ein-angeborenes-wohlgefuhl.html';

$parser = new \Nemundo\Crawler\HtmlParser\OpenGraphParser($url);

(new \Nemundo\Core\Debug\Debug())->write('Title: '.$parser->title);
(new \Nemundo\Core\Debug\Debug())->write('Description: '.$parser->description);
(new \Nemundo\Core\Debug\Debug())->write('Url: '.$parser->url);
(new \Nemundo\Core\Debug\Debug())->write('Image Url: '.$parser->imageUrl);
(new \Nemundo\Core\Debug\Debug())->write('Site Name: '.$parser->siteName);

(new \Nemundo\Core\Debug\Debug())->write($parser->getPropertyList());

