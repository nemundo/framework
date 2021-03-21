<?php

require '../config.php';


\Nemundo\Admin\AdminConfig::$pageTitle= 'hello world';


$template = new \Nemundo\Admin\Template\AdminTemplate();

$title = new \Nemundo\Admin\Com\Title\AdminTitle($template);
$title->content = 'Hello World';

$template->render();

