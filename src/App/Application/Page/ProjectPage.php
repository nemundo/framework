<?php

namespace Nemundo\App\Application\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\App\Application\Data\Project\ProjectReader;
use Nemundo\App\Application\Template\ApplicationTemplate;
use Nemundo\Com\Template\AbstractTemplateDocument;

class ProjectPage extends ApplicationTemplate
{
    public function getContent()
    {


        $table=new AdminTable($this);

        $reader=new ProjectReader();

        $header=new AdminTableHeader($table);
        $header->addText($reader->model->project->label);
        $header->addText('Version');

        foreach ($reader->getData() as $projectRow) {

            $row=new AdminClickableTableRow($table);
            $row->addText($projectRow->project);

            $row->addText('0.1');


        }


        return parent::getContent();
    }
}