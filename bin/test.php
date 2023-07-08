<?php

require "config.php";


//(new \Nemundo\User\Backup\UserBackup())->export();


(new \Nemundo\User\Data\User\UserDelete())->delete();
(new \Nemundo\User\Data\UserUsergroup\UserUsergroupDelete())->delete();


(new \Nemundo\User\Backup\UserBackup())->import();
