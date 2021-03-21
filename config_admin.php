<?php

require __DIR__ . "/config.php";

(new \Nemundo\App\ModelDesigner\ModelDesignerConfig())->addProject(new \Nemundo\FrameworkProject());
\Nemundo\Web\ResponseConfig::$title = 'Framework';
