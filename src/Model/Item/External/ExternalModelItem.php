<?php

namespace Nemundo\Model\Item\External;

use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Item\AbstractModelItem;

class ExternalModelItem extends AbstractModelItem
{

    public function getContent()
    {

        $valueList = new TextDirectory();

        /** @var AbstractModel $model */
        $model = new $this->type->externalModelClassName();

        foreach ($model->getDefaultTypeList() as $type) {

            foreach ($this->type->getTypeList() as $externalType) {

                if ($type->fieldName == $externalType->fieldName) {
                    $valueList->addValue($this->row->getModelValue($externalType));
                }
            }

        }

        $this->addContent($valueList->getTextWithSeperator(' '));

        return parent::getContent();

    }

}