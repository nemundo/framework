<?php

require 'config.php';


$model = new \Nemundo\App\Scheduler\Data\Scheduler\SchedulerModel();

$setup = new \Nemundo\Model\Setup\ModelSetup();
$setup->model = $model;
$setup->createTable();








