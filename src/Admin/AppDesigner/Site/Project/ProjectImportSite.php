<?php

namespace Nemundo\Admin\AppDesigner\Site\Project;


use Nemundo\Admin\AppDesigner\Import\ProjectImport;
use Nemundo\Core\Debug\Debug;
use Nemundo\Web\Site\AbstractSite;

class ProjectImportSite extends AbstractSite
{

    protected function loadSite()
    {
       $this->title = 'Project Import';
       $this->url = 'project-import';
    }


    public function loadContent()
    {



        (new ProjectImport())->run();

        (new Debug())->write('Project import finished');



    }


}