<?php

require 'config.php';

(new \Nemundo\Db\Provider\MySql\Database\MySqlDatabase())->emptyDatabase();

require 'init.php';
require 'setup.php';
