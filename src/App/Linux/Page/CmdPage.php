<?php

namespace Nemundo\App\Linux\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\App\Linux\Template\LinuxTemplate;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Core\Local\LocalCommand;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Html\Character\HtmlCharacter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class CmdPage extends LinuxTemplate
{
    public function getContent()
    {


        $form = new SearchForm($this);

        $row = new BootstrapRow($form);

        $listobx = new BootstrapListBox($row);
        $listobx->submitOnChange = true;
        $listobx->addItem('df', 'df');
        $listobx->addItem('ls -l', 'ls -l');

        if ($listobx->hasValue()) {

            $table = new AdminTable($this);

            $cmd = new LocalCommand();
            $value = $cmd->runLocalCommand($listobx->getValue());
            //$value = $cmd->runLocalCommand('df');

            foreach ($value as $str) {

                $row = new AdminTableRow($table);
                $row->addText($str);

                /*$list = (new Text($str))->split(' ');
                foreach ($list as $item) {
                    $row->addText($item);
                }*/



                $list = (new Text($str))->split(chr(9));
                foreach ($list as $item) {
                    $row->addText($item);
                }



            }

        }







        return parent::getContent();
    }
}