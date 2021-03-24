<?php

require 'config.php';

(new \Nemundo\Admin\Loader\AdminMySqlProjectLoader())->loadProject();
(new \Nemundo\Admin\Web\AdminWeb())->loadWeb();
