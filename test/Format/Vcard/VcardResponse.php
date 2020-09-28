<?php

require '../../config.php';


$response = new \Nemundo\Format\Vcard\VcardResponse();


$response->firstName = 'Hasn';
$response->lastName = 'Muster';
$response->email = 'hans@muster.ch';


$response->sendResponse();

