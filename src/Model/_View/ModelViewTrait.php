<?php

namespace Nemundo\Model\View;


use Nemundo\Core\Log\LogMessage;
use Nemundo\Db\Base\ConnectionTrait;
use Nemundo\Db\Filter\Filter;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Model\Reader\ModelDataReader;

trait ModelViewTrait
{

    use ConnectionTrait;

    /**
     * @var AbstractModel
     */
    public $model;

    /**
     * @var string
     */
    public $dataId;

    /**
     * @var Filter
     */
    public $filter;


    protected function loadModelView()
    {
        $this->loadConnection();
        $this->filter = new Filter();
    }


    /**
     * @return AbstractModelItem[]
     */
    public function getComList()
    {

        if (!$this->checkProperty(['model'])) {
            return;
        }

        $reader = new ModelDataReader();
        $reader->model = $this->model;
        $reader->connection = $this->connection;

        // gelöscht 20.03.2020
        //$reader->addFieldByModel($this->model);
        //$reader->checkExternal($this->model);

        $row = null;
        if ($this->dataId !== null) {
            $row = $reader->getRowById($this->dataId);
        } else {
            $reader->filter = $this->filter;
            $row = $reader->getRow();
        }

        $comList = [];

        foreach ($this->model->getTypeList() as $type) {

            if ($type->visible->view) {

                if ($type->viewItemClassName == null) {
                    (new LogMessage())->writeError('viewItemClass not defined.' . $type->getClassName());
                }

                /** @var AbstractModelItem $item */
                $item = new $type->viewItemClassName();
                $item->row = $row;
                $item->type = $type;

                $comList[] = $item;

            }

        }

        return $comList;

    }

}