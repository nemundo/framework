<?php

namespace Nemundo\App\Scheduler\Site\Job;

use Nemundo\App\Scheduler\Page\Job\JobPage;
use Nemundo\Web\Site\AbstractSite;

class JobSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Job';
        $this->url = 'job';

        new JobRunSite($this);

    }

    public function loadContent()
    {
        (new JobPage())->render();
    }
}