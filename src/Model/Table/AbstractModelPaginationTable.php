<?php

namespace Nemundo\Model\Table;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Html\Formatting\Strike;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Model\Reader\ModelDataReader;
use Nemundo\Model\Reader\PaginationModelDataReader;
use Nemundo\Model\Table\Redirect\ModelTableRedirect;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;


abstract class AbstractModelPaginationTable extends AdminTable
{

    /**
     * @var AbstractModel
     */
    public $model;

    /**
     * @var ModelDataReader
     */
    public $paginationReader;

    /**
     * @var bool
     */
    public $showHeader = true;

    /**
     * @var ModelTableRedirect[]
     */
    private $redirectList = [];

    public function __construct($parentContainer = null)
    {
        parent::__construct($parentContainer);
        $this->paginationReader = new PaginationModelDataReader();
    }


    public function addRedirectHyperlink(ModelTableRedirect $modelTableRedirect)
    {
        $this->redirectList[] = $modelTableRedirect;
        return $this;
    }


    public function getContent()
    {

        $this->addCssClass('table');
        $this->addCssClass('table-hover');


        $this->paginationReader->model = $this->model;

        /*
        foreach ($this->paginationReader->model->getTypeList() as $type) {
            if ($type->isObjectOfClass(ExternalType::class)) {
                if ($type->visible->table) {
                    //$type->loadData = true;
                }
            }
        }*/


        // Header
        if ($this->showHeader) {
            $tableHeader = new TableHeader($this);
            foreach ($this->paginationReader->model->getTypeList() as $type) {

                if ($type->visible->table) {
                    $tableHeader->addText($type->label);
                }

            }

            $loop = new ForLoop();
            $loop->minNumber = 0;
            $loop->maxNumber = sizeof($this->redirectList) - 1;
            foreach ($loop->getData() as $number) {
                $tableHeader->addEmpty();
            }


        }

        foreach ($this->paginationReader->getData() as $row) {

            $tableRow = new TableRow($this);

            foreach ($this->paginationReader->model->getTypeList() as $type) {

                if ($type->visible->table) {

                    /** @var AbstractModelItem $item */
                    $item = new $type->tableItemClassName($tableRow);
                    $item->row = $row;
                    $item->type = $type;

                }
            }


            // Hyperlink Redirect
            foreach ($this->redirectList as $redirectHyperlink) {

                if ($redirectHyperlink->parameterField == null) {
                    (new LogMessage())->writeError('No Parameter Field defined');
                    return;
                }

                $url = $redirectHyperlink->url;
                $parameter = $redirectHyperlink->parameter;
                $parameter->setValue($row->getModelValue($redirectHyperlink->parameterField));
                $url->addParameter($parameter);

                $tableRow->addHyperlink($url->getUrl(), $redirectHyperlink->label, $redirectHyperlink->openNewWindow);
            }

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $this->paginationReader;

        return parent::getContent();

    }

}