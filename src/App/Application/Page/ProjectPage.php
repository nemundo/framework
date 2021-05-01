<?php

namespace Nemundo\App\Application\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\App\Application\Data\Project\ProjectReader;
use Nemundo\App\Application\Template\ApplicationTemplate;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Local\LocalCommand;
use Nemundo\Core\Path\Path;

class ProjectPage extends ApplicationTemplate
{
    public function getContent()
    {


        $table = new AdminTable($this);

        $reader = new ProjectReader();

        $header = new AdminTableHeader($table);
        $header->addText($reader->model->project->label);
        $header->addText('Path');
        $header->addText('Version');

        foreach ($reader->getData() as $projectRow) {

            $row = new AdminClickableTableRow($table);
            $row->addText($projectRow->project);

            $project = $projectRow->getProject();

            $row->addText($project->path);

            //$row->addText($projectRow ->project);

            $projectPath = (new Path())
                ->addPath($project->path)
                ->addParentPath()
                ->getPath();

            $row->addText($projectPath);


            $cmd=new LocalCommand();


            //$list = [];



         //   cd /srv/web/nemundo_com/vendor/nemundo/srf/src/../ && git for-each-ref --sort=creatordate --format "%(refname) %(objectname)" refs/tags


            $value = $cmd->runLocalCommand('cd '.$projectPath.' && git for-each-ref --sort=creatordate --format "%(refname) %(objectname)" refs/tags');
            //$row->addText($value);

            //  %(creatordate)

            $ul =new UnorderedList($row);
            foreach ($value as $version) {
                $ul->addText($version);
            }
            //(new Debug())->write($value);


            //$row->addText('0.1');


        }


        return parent::getContent();
    }
}