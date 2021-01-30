<?php


namespace Nemundo\App\Translation\Type\Source;


use Nemundo\App\Translation\Data\TextTranslation\TextTranslationDelete;

class TextSourceType extends AbstractSourceType
{

    protected function loadType()
    {

        $this->sourceType='Text';

    }


    // deleteTranslation($dataId)
    public function deleteTranslation($dataId)
    {

        $sourceId= parent::deleteTranslation($dataId);

        $delete=new TextTranslationDelete();
        $delete->filter->andEqual($delete->model->sourceId,$sourceId);
        $delete->delete();

    }


}