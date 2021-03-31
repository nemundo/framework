<?php

require "config.php";

(new \Nemundo\Project\Reset\ProjectReset())->reset();
(new \Nemundo\Project\Install\ProjectInstall())->install();
(new \Nemundo\Project\Reset\ProjectReset())->remove();
