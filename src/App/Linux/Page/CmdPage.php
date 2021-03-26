<?php

namespace Nemundo\App\Linux\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\App\Git\Parameter\PathParameter;
use Nemundo\App\Linux\Site\LinuxSite;
use Nemundo\App\Linux\Template\LinuxTemplate;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Local\LocalCommand;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Package\Bootstrap\Breadcrumb\BootstrapBreadcrumb;

class CmdPage extends LinuxTemplate
{
    public function getContent()
    {


        $table=new AdminTable($this);


        $cmd = new LocalCommand();
        $value = $cmd->runLocalCommand('df');

        foreach ($value as $str) {

            $row=new AdminTableRow($table);
            $row->addText($str);

            $list = (new Text($str))->split(' ');
            foreach ($list as $item) {
                $row->addText($item);
            }


        }






        return parent::getContent();
    }
}