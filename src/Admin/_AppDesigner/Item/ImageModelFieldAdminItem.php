<?php

namespace Nemundo\Admin\AppDesigner\Item;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppImageType\AppImageTypeReader;
use Nemundo\Admin\AppDesigner\Parameter\ModelFieldParameter;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\Html\Listing\UnorderedList;


class ImageModelFieldAdminItem extends AbstractModelFieldAdminItem
{

    public function getContent()
    {

        $list = new UnorderedList($this);

        $imageTypeReader = new AppImageTypeReader();
        $imageTypeReader->connection = new AppDesignerConnection();
        $imageTypeReader->model->loadResizeType();
        $imageTypeReader->filter->andEqual($imageTypeReader->model->appFieldId, $this->fieldId);

        foreach ($imageTypeReader->getData() as $imageTypeRow) {
            $list->addText($imageTypeRow->resizeType->resizeType . ' ' . $imageTypeRow->size);
        }


        $link = new SiteHyperlink($this);
        //$link->content = 'edit';
        $link->site = AppDesignerConfig::$site->image;
        $link->site->addParameter(new ModelFieldParameter($this->fieldId));


        return parent::getContent();
    }

}