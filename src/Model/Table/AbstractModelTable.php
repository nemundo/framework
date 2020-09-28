<?php

namespace Nemundo\Model\Table;


use Nemundo\Html\Table\AbstractTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Db\Base\ConnectionTrait;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Model\Reader\ModelDataReader;
use Nemundo\Model\Table\Redirect\ModelTableRedirect;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Model\Type\External\ExternalType;


abstract class AbstractModelTable extends AbstractTable
{

    use ConnectionTrait;

    /**
     * @var AbstractModel
     */
    public $model;

    /**
     * @var Filter
     */
    public $filter;

    /**
     * @var int
     */
    public $limitStart = 0;

    /**
     * @var int
     */
    public $limit;

    /**
     * @var ModelDataReader
     */
    protected $reader;

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

        $this->loadConnection();

        $this->reader = new ModelDataReader();
        $this->filter = new Filter();

    }


    public function addOrder(AbstractModelType $type, $sortOrder = SortOrder::ASCENDING)
    {
        $this->reader->addOrder($type, $sortOrder);
        return $this;
    }


    public function addRedirectHyperlink(ModelTableRedirect $modelTableRedirect)
    {
        $this->redirectList[] = $modelTableRedirect;
        return $this;
    }


    public function getContent()
    {

        if (!$this->checkProperty('model')) {
            exit;
        }

        if (!$this->model->isObjectOfClass(AbstractModel::class)) {
            (new LogMessage())->writeError('Property model is not a AbstractModel Class');
            return;
        }

        $this->model->checkModel();
        $this->reader->model = $this->model;
        $this->reader->connection = $this->connection;
        $this->reader->filter = $this->filter;
        $this->reader->limitStart = $this->limitStart;
        $this->reader->limit = $this->limit;

        $this->reader->addFieldByModel($this->model);
        $this->reader->checkExternal($this->model);


        foreach ($this->model->getTypeList() as $type) {
            if ($type->isObjectOfClass(ExternalType::class)) {
                if ($type->visible->table) {
                    //$type->loadData = true;
                }
            }
        }

        // Order By
        /* foreach ($this->model->getDefaultOrderList() as $modelOrder) {
             $this->reader->addOrder($modelOrder->type, $modelOrder->sortOrder);
         }*/

        // Header
        if ($this->showHeader) {
            $tableHeader = new TableHeader($this);
            foreach ($this->model->getTypeList() as $type) {

                /*
                if ($type->isObjectOfClass(ExternalType::class)) {
                    if (!$type->loadData) {
                        $type->visible->table = false;
                    }
                }*/


                if ($type->visible->table) {
                    $tableHeader->addText($type->label);
                }

            }

            foreach ($this->redirectList as $redirectHyperlink) {
                $tableHeader->addEmpty();
            }
        }

        foreach ($this->reader->getData() as $row) {

            $tableRow = new TableRow($this);

            foreach ($this->model->getTypeList() as $type) {

                if ($type->visible->table) {

                    if ($type->tableItemClassName == null) {
                        (new LogMessage())->writeError('not defined: ' . $type->getClassName());
                    } else {

                        /** @var AbstractModelItem $item */
                        $item = new $type->tableItemClassName($tableRow);
                        $item->row = $row;
                        $item->type = $type;

                    }
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

        return parent::getContent();

    }

}