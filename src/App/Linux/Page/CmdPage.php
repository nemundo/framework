<?php

namespace Nemundo\App\Linux\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\App\Linux\Cmd\DiskUsageCmd;
use Nemundo\App\Linux\Cmd\DistributionVersionCmd;
use Nemundo\App\Linux\Cmd\RebootCmd;
use Nemundo\App\Linux\Com\ListBox\CommandListBox;
use Nemundo\App\Linux\Template\LinuxTemplate;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Core\Local\LocalCommand;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Html\Typography\Code;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class CmdPage extends LinuxTemplate
{
    public function getContent()
    {


        $form = new SearchForm($this);

        $row = new BootstrapRow($form);

        $listbox = new CommandListBox($row);
        $listbox->submitOnChange = true;
        $listbox->searchMode = true;

        $listbox->addCommand(new DiskUsageCmd());
        $listbox->addCommand(new RebootCmd());
        $listbox->addCommand(new DistributionVersionCmd());


        if ($listbox->hasValue()) {


            $cmd = new LocalCommand();
            $value = $cmd->runLocalCommand($listbox->getValue());


            $code = new Code($this);
            $code->content = $value;


            $table = new AdminTable($this);


            foreach ($value as $str) {

                $row = new AdminTableRow($table);
                $row->addText($str);

                $list = (new Text($str))->split(' ');
                foreach ($list as $item) {
                    $row->addText($item);
                }


                /*
                                $list = (new Text($str))->split(chr(9));
                                foreach ($list as $item) {
                                    $row->addText($item);
                                }*/


            }

        }


        return parent::getContent();
    }
}