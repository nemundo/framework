<?php


namespace Nemundo\App\Translation\Setup;


use Nemundo\App\Translation\Data\SourceType\SourceType;
use Nemundo\App\Translation\Data\SourceType\SourceTypeCount;
use Nemundo\App\Translation\Data\SourceType\SourceTypeUpdate;
use Nemundo\App\Translation\Type\Source\AbstractSourceType;
use Nemundo\Core\Base\AbstractBase;

// TranslationSourceSetup
class SourceSetup extends AbstractBase
{

    public function addSourceType(AbstractSourceType $sourceType)
    {

        $count = new SourceTypeCount();
        $count->filter->andEqual($count->model->sourceType, $sourceType->sourceType);
        if ($count->getCount() == 0) {
            $data = new SourceType();
            $data->sourceType = $sourceType->sourceType;
            $data->phpClass=$sourceType->getClassName();
            $data->save();
        }

        /*else {

            $update = new SourceTypeUpdate();
            $data->sourceType = $sourceType->sourceType;
            $data->phpClass=$sourceType->getClassName();
            $data->save();

        }*/

        return $this;

    }

}