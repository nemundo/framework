<?php

require "config.php";

(new \Nemundo\Project\Reset\ProjectReset())->reset();
(new \Nemundo\Project\Install\ProjectInstall())->install();

(new \Nemundo\App\Apache\Application\ApacheApplication())->installApp();

(new \Nemundo\Project\Reset\ProjectReset())->remove();
