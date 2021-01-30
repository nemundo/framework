<?php


namespace Nemundo\App\Translation\Type\Source;


use Nemundo\App\Translation\Data\TextTranslation\TextTranslationDelete;

class LargeTextSourceType extends AbstractSourceType
{

    protected function loadType()
    {

        // TODO: Implement loadType() method.

        $this->sourceType='LargeText';

    }


    public function deleteTranslation($dataId)
    {
        
        $sourceId= parent::deleteTranslation($dataId);

        $delete=new TextTranslationDelete();
        $delete->filter->andEqual($delete->model->sourceId,$sourceId);
        $delete->delete();

    }


}