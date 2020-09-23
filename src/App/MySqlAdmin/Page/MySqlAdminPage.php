<?php


namespace Nemundo\App\MySqlAdmin\Page;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\App\MySqlAdmin\Com\ListBox\MySqlTableListBox;
use Nemundo\App\MySqlAdmin\Com\Table\MySqlDataTable;
use Nemundo\App\MySqlAdmin\Parameter\TableParameter;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Db\Count\DataCount;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;

class MySqlAdminPage extends AdminTemplate
{

    public function getContent()
    {

        $form = new SearchForm($this);
        $formRow = new BootstrapFormRow($form);

        $listbox = new MySqlTableListBox($formRow);
        $listbox->searchMode = true;
        $listbox->submitOnChange = true;

        $tableParameter = new TableParameter();
        if ($tableParameter->exists()) {

            $tableName = $tableParameter->getValue();

            $title = new AdminTitle($this);
            $title->content = $tableName;

            $count = new DataCount();
            $count->tableName = $tableName;

            $p = new Paragraph($this);
            $p->content = (new Number($count->getCount()))->formatNumber() . ' Rows';

            $table = new MySqlDataTable($this);
            $table->tableName = $tableName;

        }

        return parent::getContent();

    }

}