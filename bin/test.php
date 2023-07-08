<?php

require "config.php";

//(new \Nemundo\App\UserAdmin\Backup\UserBackup())->export();
(new \Nemundo\User\Backup\UserBackup())->import();
