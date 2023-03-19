<?php

use Besucherfrequenz\Import\BesucherfrequenzWeekdayImport;

require "config.php";


(new \Besucherfrequenz\Data\BesucherfrequenzWeekday\BesucherfrequenzWeekdayDelete())->delete();
(new BesucherfrequenzWeekdayImport())->importData();